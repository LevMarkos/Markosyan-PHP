return [
    'store_post' => [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],
    'store_user' => [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ],
    'update_post' => [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ],
    'update_user' => [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,:id',
        'password' => 'nullable|string|min:6|confirmed',
    ],
];
