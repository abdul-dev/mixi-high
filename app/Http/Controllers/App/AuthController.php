<?php

namespace App\Http\Controllers\App;

use App\Models\BankAccount;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Models\UserDeliveryAddress;
use Aws\Exception\AwsException;
use Aws\Rekognition\RekognitionClient;
use Aws\S3\S3Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function loginBackend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $client = $request->client ?? 'user';

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $User = User::with(['role'])->where('email', $request->email)->first();

        // check if User exist or not
        if (!$User) {
            return response()->json([
                'status' => false,
                'message' => 'No user registered with this email'
            ]);
        }

        // check if password match or not
        if (Hash::check($request->password, $User->password)) {

            $token = $User->createToken('users')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Logged in',
                'user_data' => $User,
                'token' => ['token' => $token]
            ])->header('Cache-Control', 'private')->header('Authorization', $token);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Password!'
            ]);
        }
    }

    public function Logout(Request $request)
    {

        return response()->json([
            'status' => true,
            'message' => 'Logout Successfully'
        ]);
    }

    public function registerBackend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
            // 'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $Actor = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'role_id' => Role::firstWhere('code', 'customer')->id,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now()
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Register Successfully!'
        ]);
    }

    public function changePassword()
    {
        return view('register.change_password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $User = User::where('id', Auth::id())->first();
        if (Hash::check($request->current_password, $User->password)) {
            $User->password = Hash::make($request->new_password);
            $User->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully'
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Current Password does not match'
            ]);
        }
    }

    public function forgotPassword()
    {
        return view('register.forgot_password');
    }

    public function forgotPasswordCheck(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $User = User::where('email', $request->email)->first();
        if (!empty($User)) {
            $password_reset_code = date('hisymd') . $User->id;
            $User->password_reset_code = $password_reset_code;
            $User->save();

            /*******PREPARE EMAIL FOR USER PASSWORD RESET********/
            $link = env('BASE_URL') . 'reset/' . $password_reset_code;
            // Notification::send($user, new PasswordReset($details));
            $User->notify(new PasswordReset($password_reset_code));


            /*******END- PREPARE EMAIL FOR USER PASSWORD RESET********/

            return response()->json([
                'status' => TRUE,
                'message' => "An Email Has been sent to your email address to reset your password",
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => "Email doesn't exists!"
            ]);
        }
    }

    public function reset($password_reset_code)
    {
        $User = User::where('password_reset_code', $password_reset_code)->get()->toArray();
        if (empty($User)) {
            return response()->json([
                'status' => false,
                'message' => 'Code is invalid'
            ]);
        }
        return view('register.reset_password')->with(['password_reset_code' => $password_reset_code]);
//        return response()->json([
//            'status' => true,
//            'message' => 'Code Match'
//        ]);

    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_reset_code' => 'required',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $User = User::where('password_reset_code', $request->password_reset_code)->first();
        if (!empty($User)) {
            $User->password = \Illuminate\Support\Facades\Hash::make($request->password);
            $User->password_reset_code = '';
            $User->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully'
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Invalid password reset request'
            ]);
        }
    }

    public function accountSetting()
    {
        return view('register.account_setting');
    }

    public function show()
    {
        return response()->json([
            'status' => true,
            'data' => User::find(Auth::id())
        ]);
    }

    public function accountSettingUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $checkPhoneExist = User::where('phone', $request->phone)->where('id', '!=', Auth::id())->first();
        if ($checkPhoneExist) {
            return response()->json([
                'status' => false,
                'message' => 'Phone No Already Exists'
            ]);
        }

        $User = User::where('id', Auth::id())->first();
        if (!empty($User)) {
            $User->name = $request->name;
            $User->phone = $request->phone;
            $User->email = $request->email;
            $User->gender = $request->gender;
            $User->address = $request->address;

//            if (!empty($request->device_token)) {
//                $User->device_token = $request->device_token['value'] ?? $request->device_token;
//            }
//            $User->device_os = $request->device_os ?? $User->device_os;
//            $User->device_platform = $request->device_platform ?? $User->device_platform;

            $User->save();
            return response()->json([
                'status' => true,
                'message' => 'Profile Updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Invalid request'
            ]);
        }
    }

    public function storeDeliveriesAddresses(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'phone' => 'required|string',
            'company_name' => 'nullable|string',
            'street_address' => 'required|string',
            'address_detail' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'city' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }


        UserDeliveryAddress::where('user_id', Auth::id())->update([
            'is_default' => 0
        ]);

        // Create a new user delivery address instance
        $userAddress = new UserDeliveryAddress();

        // Assign values from the request
        $userAddress->user_id = Auth::id();
        $userAddress->state_id = $request->state_id;
        $userAddress->first_name = $request->first_name;
        $userAddress->last_name = $request->last_name;
        $userAddress->phone = $request->phone;
        $userAddress->company_name = $request->company_name;
        $userAddress->street_address = $request->street_address;
        $userAddress->address_detail = $request->address_detail;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->city = $request->city;
        $userAddress->is_default = 1;

        // Save the user delivery address
        $userAddress->save();

        return response()->json([
            'status' => true,
            'message' => 'User delivery address stored successfully',
            'data' => $userAddress
        ]);

    }

    public function setDefaultAddress(Request $request)
    {
        $id = $request->id;

        // Find the user delivery address with the provided ID
        $address = UserDeliveryAddress::findOrFail($id);

        // Get the user ID of the address
        $userId = $address->user_id;

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Set the address as default
            $address->is_default = true;
            $address->save();

            // Update all other addresses of the user to be non-default
            UserDeliveryAddress::where('user_id', $userId)
                ->where('id', '!=', $id)
                ->update(['is_default' => false]);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Default delivery address updated successfully',
                'data' => $address
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Failed to update default delivery address',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getDeliveriesAddresses(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => UserDeliveryAddress::where('user_id', Auth::id())->get()
        ]);
    }

    public function deleteAddress(Request $request)
    {
        $Address = UserDeliveryAddress::find($request->id);

        if ($Address) {
            $Address->delete();

            return response()->json([
                'status' => true,
                'message' => 'Address deleted successfully'
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => 'invalid request'
        ]);
    }


    public function verify($user_id, Request $request)
    {
        if (!$request->hasValidSignature()) {
            $message = "Invalid/Expired url provided.";
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $message = "Email has been verified. You can now login from app";
        } else {
            $message = "Email verified already";
        }

        return response()->json([
            'status' => TRUE,
            'message' => $message
        ]);
    }

    public function getStates()
    {
        return response()->json([
            'status' => true,
            'data' => State::all()
        ]);
    }

    public function verifyUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_image' => 'required',
            'id_card_image' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Call the verifyUserWithImages function passing the necessary parameters
        // Here $request->user_image and $request->id_card_image should contain the image keys or URLs
        $result = $this->verifyUserWithImages($request);

        return $result;
    }

    function verifyUserWithImages($request)
    {
        // Initialize S3 client
        $s3 = new S3Client([
            'region' => env('AWS_DEFAULT_REGION'), // Replace with your AWS region
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
            'http' => [
                'verify' => false, // Disable SSL certificate verification
            ],
        ]);

        // Upload user image to S3
        $userImageKey = $this->uploadToS3($s3, $request->file('user_image'), 'user-images');
        // Upload ID card image to S3
        $idCardImageKey = $this->uploadToS3($s3, $request->file('id_card_image'), 'user-id-card-images');

        // Initialize Rekognition client
        $rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'), // Replace with your AWS region
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
            'http' => [
                'verify' => false, // Disable SSL certificate verification
            ],
        ]);

        // Call Rekognition service to analyze user image
        $userImageLabels = $this->detectLabels($rekognition, $userImageKey);

        // Call Rekognition service to analyze ID card image
        $idCardImageLabels = $this->detectLabels($rekognition, $idCardImageKey);

        // Check if user image contains specific labels you are interested in
        $userContainsBird = $this->checkForLabel($userImageLabels, 'Person');

        // Check if ID card image contains specific labels you are interested in
        $idCardContainsPerson = $this->checkForLabel($idCardImageLabels, 'Id Cards');

        // Update user table based on image analysis results
        if ($userContainsBird && $idCardContainsPerson) {
            // Update user table to mark user as verified
            User::where('id', $request->user_id)->update([
                'is_verified' => 1
            ]);

            return [
                'status' => true,
                'message' => 'verification successfully.'
            ];
        } else {
            // Handle the case when the required labels are not detected, maybe show an error message
            return [
                'status' => false,
                'message' => 'verification failed try again.'
            ];
        }
    }

    // Function to upload file to S3 and return the object key
    private function uploadToS3($s3, $image, $folder)
    {
//        dd($image);
        // Get the file contents
        $fileContents = file_get_contents($image->getRealPath());

        // Generate a unique object key
        $objectKey = $folder . '/' . uniqid() . '.' . $image->getClientOriginalExtension();

        // Upload the file to S3
        $s3->putObject([
            'Bucket' => env('AWS_BUCKET'), // Replace with your S3 bucket name
            'Key' => $objectKey,
            'Body' => $fileContents,
            'ContentType' => $image->getMimeType(),
        ]);

        return $objectKey;
    }

    // Function to detect labels in an image
    private function detectLabels($rekognition, $imageKey)
    {

        try {
            $result = $rekognition->detectLabels([
                'Image' => [
                    'S3Object' => [
                        'Bucket' => env('AWS_BUCKET'), // Replace with your S3 bucket name
                        'Name' => $imageKey,
                    ],
                ],
            ]);

            return $result['Labels'];
        } catch (AwsException $e) {
            // Handle any exceptions
            // For now, just return an empty array
            return $e->getMessage();
        }
    }

    // Function to check if a label exists in the given labels array
    private function checkForLabel($labels, $targetLabel)
    {
        foreach ($labels as $label) {
            if ($label['Name'] === $targetLabel) {
                return true;
            }
        }
        return false;
    }


    public function storeBankAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_holder_name' => 'required',
            'routing_number' => 'required',
            'account_number' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $bankAccount = BankAccount::where('user_id', Auth::id())->first();

        if (empty($bankAccount)) {
            $bankAccount = new BankAccount();
        }
        $bankAccount->user_id = Auth::id();
        $bankAccount->account_holder_name = $request->input('account_holder_name');
        $bankAccount->routing_number = $request->input('routing_number');
        $bankAccount->account_number = $request->input('account_number');
        // Add other necessary fields
        $bankAccount->save();

        return response()->json([
            'status' => true,
            'message' => 'Bank account stored successfully'
        ]);
    }

}
