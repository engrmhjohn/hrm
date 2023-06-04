<?php

// function image_upload($image, $title = '')
// {
//     if ($image->extension() == 'pdf') {
//         $imageName = 'hrm' . '-' . str_replace(' ', '-', $title) .'-'. rand(1, 999) . '.' . $image->extension();
//         // Public Folder
//         $image->move(public_path('storage/uploads'), $imageName);
//         return 'storage/uploads/' . $imageName;
//     } else {
//         $imageName = time() . rand(1, 999) . '.' . $image->extension();
//         // Public Folder
//         $image->move(public_path('storage/uploads'), $imageName);
//         return 'storage/uploads/' . $imageName;
//     }
// }

function image_upload($image, $title = '')
{
    if ($image) {
            $imageName = time() . rand(1, 999) . '.' . $image->extension();
            // Public Folder
            $image->move(public_path('storage/uploads'), $imageName);
            return 'storage/uploads/' . $imageName;
        }
    return null;
}


function delete_image($image_name, $path = '')
{
    if (isset($image_name)) {
        if (file_exists(public_path($image_name))) {
            unlink($image_name);
        }
    }
}
