<?php

require_once __DIR__ . '/vendor/autoload.php';

use Inilim\Dump\Dump;
use Inilim\Array\Array_;

Dump::init();

$array = [
    'a' => [
        'b' => [
            'c' => 1,
            'd' => 2,
        ],
        'e' => 3,
    ],
    'f' => [
        'g' => 4,
        'h' => 5,
    ],
];

$res = _arr()->resetKeysRecursive($array);
$res = _arr()->dot($res);
de($res);


$a = _arr()->compareValues(['111' => 1, 2, '3'], [3, 2, 1]);

dde($a);





// $value = array(
//     "employees" => array(
//         "John" => array(
//             "personal" => array(
//                 "age" => 30,
//                 "address" => "123 Main St, City, Country",
//                 "contact" => array(
//                     "email" => "john@example.com",
//                     "phone" => "123-456-7890"
//                 )
//             ),
//             "professional" => array(
//                 "position" => "Developer",
//                 "skills" => array(
//                     "languages" => array(
//                         "PHP" => array(
//                             "level" => "Expert",
//                             "experience" => "5 years"
//                         ),
//                         "JavaScript" => array(
//                             "level" => "Intermediate",
//                             "experience" => "3 years"
//                         ),
//                         "Python" => array(
//                             "level" => "Beginner",
//                             "experience" => "1 year"
//                         )
//                     ),
//                     "databases" => array(
//                         "MySQL" => array(
//                             "level" => "Expert",
//                             "experience" => "4 years"
//                         ),
//                         "PostgreSQL" => array(
//                             "level" => "Intermediate",
//                             "experience" => "2 years"
//                         )
//                     ),
//                     "tools" => array(
//                         "Git" => array(
//                             "level" => "Expert",
//                             "experience" => "5 years"
//                         ),
//                         "Docker" => array(
//                             "level" => "Intermediate",
//                             "experience" => "3 years"
//                         )
//                     )
//                 ),
//                 "projects" => array(
//                     "Project A" => array(
//                         "role" => "Lead Developer",
//                         "contribution" => "Architected the backend system"
//                     ),
//                     "Project B" => array(
//                         "role" => "Developer",
//                         "contribution" => "Developed the frontend interface"
//                     )
//                 )
//             )
//         ),
//         "Jane" => array(
//             "personal" => array(
//                 "age" => 28,
//                 "address" => "456 Elm St, City, Country",
//                 "contact" => array(
//                     "email" => "jane@example.com",
//                     "phone" => "987-654-3210"
//                 )
//             ),
//             "professional" => array(
//                 "position" => "Designer",
//                 "skills" => array(
//                     "design" => array(
//                         "Adobe XD" => array(
//                             "level" => "Expert",
//                             "experience" => "4 years"
//                         ),
//                         "Sketch" => array(
//                             "level" => "Intermediate",
//                             "experience" => "3 years"
//                         ),
//                         "Illustrator" => array(
//                             "level" => "Beginner",
//                             "experience" => "1 year"
//                         )
//                     ),
//                     "tools" => array(
//                         "Figma" => array(
//                             "level" => "Expert",
//                             "experience" => "4 years"
//                         ),
//                         "InVision" => array(
//                             "level" => "Intermediate",
//                             "experience" => "3 years"
//                         )
//                     )
//                 ),
//                 "projects" => array(
//                     "Project A" => array(
//                         "role" => "UI/UX Designer",
//                         "contribution" => "Designed the user interface"
//                     ),
//                     "Project C" => array(
//                         "role" => "Designer",
//                         "contribution" => "Created the visual branding"
//                     )
//                 )
//             )
//         ),
//         "Mike" => array(
//             "personal" => array(
//                 "age" => 35,
//                 "address" => "789 Oak St, City, Country",
//                 "contact" => array(
//                     "email" => "mike@example.com",
//                     "phone" => "555-123-4567"
//                 )
//             ),
//             "professional" => array(
//                 "position" => "Manager",
//                 "skills" => array(
//                     "management" => array(
//                         "Leadership" => array(
//                             "level" => "Expert",
//                             "experience" => "8 years"
//                         ),
//                         "Strategic Planning" => array(
//                             "level" => "Expert",
//                             "experience" => "7 years"
//                         ),
//                         "Team Management" => array(
//                             "level" => "Intermediate",
//                             "experience" => "5 years"
//                         )
//                     ),
//                     "tools" => array(
//                         "Slack" => array(
//                             "level" => "Expert",
//                             "experience" => "6 years"
//                         ),
//                         "Trello" => array(
//                             "level" => "Expert",
//                             "experience" => "5 years"
//                         )
//                     )
//                 ),
//                 "projects" => array(
//                     "Project B" => array(
//                         "role" => "Project Manager",
//                         "contribution" => "Managed the project timeline"
//                     ),
//                     "Project C" => array(
//                         "role" => "Manager",
//                         "contribution" => "Led the team and made strategic decisions"
//                     )
//                 )
//             )
//         )
//     ),
//     "projects" => array(
//         "Project A" => array(
//             "team" => array("John", "Jane"),
//             "status" => "In Progress",
//             "deadline" => "2022-12-31",
//             "tasks" => array(
//                 "Task 1" => array(
//                     "assigned_to" => "John",
//                     "status" => "In Progress",
//                     "deadline" => "2022-11-30",
//                     "details" => "Implement the backend API"
//                 ),
//                 "Task 2" => array(
//                     "assigned_to" => "Jane",
//                     "status" => "Not Started",
//                     "deadline" => "2022-12-15",
//                     "details" => "Design the user interface"
//                 )
//             )
//         ),
//         "Project B" => array(
//             "team" => array("Mike", "John"),
//             "status" => "Completed",
//             "deadline" => "2021-11-30",
//             "tasks" => array(
//                 "Task 1" => array(
//                     "assigned_to" => "Mike",
//                     "status" => "Completed",
//                     "deadline" => "2021-10-31",
//                     "details" => "Manage the project timeline"
//                 ),
//                 "Task 2" => array(
//                     "assigned_to" => "John",
//                     "status" => "Completed",
//                     "deadline" => "2021-11-15",
//                     "details" => "Develop the frontend interface"
//                 )
//             )
//         ),
//         "Project C" => array(
//             "team" => array("Jane", "Mike"),
//             "status" => "Planning",
//             "deadline" => "2023-03-31",
//             "tasks" => array(
//                 "Task 1" => array(
//                     "assigned_to" => "Jane",
//                     "status" => "Planning",
//                     "deadline" => "2022-12-31",
//                     "details" => "Create the visual branding"
//                 ),
//                 "Task 2" => array(
//                     "assigned_to" => "Mike",
//                     "status" => "Planning",
//                     "deadline" => "2023-01-15",
//                     "details" => "Lead the team and make strategic decisions"
//                 )
//             )
//         )
//     ),
//     "departments" => array(
//         "IT" => array(
//             "employees" => array("John", "Mike"),
//             "projects" => array("Project A", "Project B")
//         ),
//         "Design" => array(
//             "employees" => array("Jane"),
//             "projects" => array("Project A", "Project C")
//         ),
//         "Management" => array(
//             "employees" => array("Mike"),
//             "projects" => array("Project B", "Project C")
//         )
//     )
// );

// $value = [
//     [
//         'name' => 'John Doe',
//         'department' => 'Sales',
//     ],
//     [
//         'name' => 'Jane Doe',
//         'department' => 'Sales',
//     ],
//     [
//         'name' => 'Johnny Doe',
//         'department' => 'Marketing',
//         'test' => [
//             'name' => 'Test Johnny Doe',
//             'department' => 'Test Marketing',
//         ],
//     ]
// ];

// $a = _arr()->mapToGroups($value, function (array $item, int $key) {
//     return [$item['department'] => $item];
// });

// $a = \_arr()->dataGet($value, 'employees.Mike.*.skills.management');
// $a = \_arr()->dataGet2($value, 'employees.Mike.*.skills.management');
$a = \_arr()->getDotKeys($value, 'employees.Mike.*.skills.management.*.experience');

// $a = \_arr()->dataGet2($value, 'employees.Mike.professional.skills.management');



de($a);
$a = [1, 2, 3, 4];


$a = Array_::map($a, function ($i) {
    return $i + 1;
});


de($a);





de();




/**
 * установить значение если значения по ключу нет
 * @param mixed $value
 */
function setValueIfNotExists(array &$array, string $key_dot, $value): bool
{
    if (!\_arr()->has($array, $key_dot)) {
        \_arr()->set($array, $key_dot, $value);
        return true;
    }
    return false;
}

/**
 * установить значение если значение по ключу null
 * @param mixed $value
 */
function setValueIfNull(array &$array, string $key_dot, $value): bool
{
    if (\_arr()->has($array, $key_dot) && \_arr()->get($array, $key_dot) === null) {
        \_arr()->set($array, $key_dot, $value);
        return true;
    }
    return false;
}

function renameDotKey(array &$array, string $old_key, string $new_key): bool
{
    $array  = \_arr()->dot($array);
    $result = \_arr()->renameKey($array, $old_key, $new_key);
    $array  = \_arr()->undot($array);
    return $result;
}

/**
 * @param  (string|int)[]|string|int $keys
 */
function onlyNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->map($array, static fn($item) => \_arr()->only($item, $keys));
    } else {
        foreach ($array as $idx =>  $item) {
            if (\is_array($item)) {
                $array[$idx] = \onlyNestedArray($item, ($depth - 1));
            }
        }
        return $array;
    }
}

/**
 * @param  (string|int)[]|string|int $keys
 */
function exceptNestedArray(array $array, $keys, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->map($array, static fn($item) => \_arr()->except($item, $keys));
    } else {
        foreach ($array as $idx =>  $item) {
            if (\is_array($item)) {
                $array[$idx] = \exceptNestedArray($item, ($depth - 1));
            }
        }
        return $array;
    }
}

function getNestedArraysAtLevel(array $array, int $depth = 1): array
{
    if ($depth === 0) {
        return \_arr()->where($array, static fn($item) => \is_array($item));
    } else {
        $result = [];
        foreach ($array as $item) {
            if (\is_array($item)) {
                $result = \array_merge($result, \getNestedArraysAtLevel($item, ($depth - 1)));
            }
        }
        return $result;
    }
}
