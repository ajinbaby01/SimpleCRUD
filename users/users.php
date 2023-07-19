<?php
function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($userId)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $userId) {
            return $user;
        }
    }
    return null;
}

function updateUser($formData, $userId){
    $users = getUsers();
    foreach ($users as $i => $user) {
        if($user['id'] == $userId){
            if(empty($formData['name'])){
                $formData['name'] = $user['name'];
            }
            if(empty($formData['username'])){
                $formData['username'] = $user['username'];
            }
            if(empty($formData['email'])){
                $formData['email'] = $user['email'];
            }
            if(empty($formData['phone'])){
                $formData['phone'] = $user['phone'];
            }
            if(empty($formData['website'])){
                $formData['website'] = $user['website'];
            }
            // Need to check for empty string.
            //Otherwise existing data in $user will be replaced by empty string in $formData during array_merge()
            $users[$i] = array_merge($user, $formData);
            break;
            // Can use '$users[$i] = $formData'.
            // But this might remove any data in $users[$i] (ie, $user) that is not shown in form data.
            // So we merge $user and $formData that replaces the data in $user available in both array but keeps old non-similar key data
        }
    }

    putJson($users);
}

function createUser($formData){
    $users = getUsers();
    $maxId = $users[count($users) - 1]['id'];
    $formData = ['id' => ++$maxId, ...$formData];
    $users[] = $formData;
    putJson($users);
}

function deleteUser($userId){
    $users = getUsers();
    foreach ($users as $i => $user) {
        if($user['id'] == $userId){
            array_splice($users, $i, 1);
            break;
        }
    }
    putJson($users);
    
}

function validateUser($user, &$errors){
    $isValid = true;

    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = "Name is mandatory";
    }
    if (!$user['username']) {
        $isValid = false;
        $errors['username'] = "Username is mandatory";
    }
    if ($user['email']) {
        $originalEmail = $user['email'];
        $cleanEmail = filter_var($originalEmail, FILTER_SANITIZE_EMAIL);
        if (!$originalEmail || $originalEmail != $cleanEmail || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $errors['email'] = "Email is invalid";
        }
    } else {
        $isValid = false;
        $errors['email'] = "Email is mandatory";
    }
    if (!$user['phone'] || !filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = "Phone is invalid";
    }
    if(!$user['website'] || !filter_var($user['website'], FILTER_VALIDATE_URL)){
        $isValid = false;
        $errors['website'] = "Website is invalid";
    }
    return $isValid;
}

function putJson($users){
    file_put_contents('users/users.json', json_encode($users, JSON_PRETTY_PRINT));
}
?>