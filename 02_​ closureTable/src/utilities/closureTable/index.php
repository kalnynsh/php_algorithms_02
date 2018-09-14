<?php

$db_config = parse_ini_file(__DIR__ . '/config/db_config.ini');

$host = $db_config['host'];
$dbname = $db_config['dbname'];
$username = $db_config['username'];
$password = $db_config['password'];

$connect = mysqli_connect($host, $username, $password, $dbname);

function getConnection($db_config)
{
    $host = $db_config['host'];
    $dbname = $db_config['dbname'];
    $username = $db_config['username'];
    $password = $db_config['password'];

    $connect = mysqli_connect($host, $username, $password, $dbname);

    return $connect;
}

$categoriesTable = 'categories_ct';
$categoriesTree = 'categories_ct_tree';

$parentID = 1;
$queryChilrenID1 =
    "SELECT c.id, c.name, t.nearest_parent_id, t.parent_id,
            t.child_id, t.`level`
            FROM `$categoriesTable` AS c
                JOIN `$categoriesTree` AS t
                    ON c.id = t.child_id
                WHERE t.parent_id = $parentID
                ORDER BY t.`level`;"
;

$resultChilrenID1 = mysqli_query($connect, $queryChilrenID1);

if (mysqli_num_rows($resultChilrenID1) > 0) {
    $allCategories = [];

    while ($row = mysqli_fetch_assoc($resultChilrenID1)) {
        $allCategories[] = $row;
    }
}

/*
 * filtering an array
 */
function filterByValue($array, $index, $value)
{
    if (is_array($array) && count($array) > 0) {
        foreach (array_keys($array) as $key) {
            $temp[$key] = $array[$key][$index];

            if ($temp[$key] == $value) {
                $newArray[$key] = $array[$key];
            }
        }
    }
    return $newArray;
}

/**
 * Get max level number
 *
 * @param array $array
 * @return int
 */
function getMaxLevel($array)
{
    if (is_array($array) && count($array) > 0) {
        $levelsArray = [];
        foreach ($array as $entry) {
            $levelsArray[] = intval($entry['level']);
        }
        return max($levelsArray);
    }
    return false;
}

/**
 * Return html string like
 * `<li>Food</li>`
 *  from given array
 *
 * @param array $arr
 * @return void
 */
function getLi($arr)
{
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $res .= '<li>';
            $res .= $item['name'];
            $res .= '</li>';
            return $res;
        }
    }

    return false;
};

/**
 * Build Catalog tree like
 * `<ul>
 *   <li>Catalog</li>
 *      <ul>
 *          <li>Food</li>
 *          ...
 *      </ul>
 *  </ul>`
 *
 * @param array $categories
 * @return string
 */
function buildTree($categories)
{
    $maxLevel = getMaxLevel($categories);
    $result = '<ul>';

    for ($i = 0; $i < $maxLevel; $i++) {
        $entryArray = filterByValue($categories, 'level', strval($i));

        if ($i === 0) {
            $result .= getLi($entryArray);
        } else {
            foreach ($entryArray as $elem) {
                $entryChildsArray;
                $result .= '<ul>';
                $result .= '<li>' . $elem['name'] . '</li>';
                $result .= '<ul>';
                $id = $elem['id'];

                $entryChildsArray = filterByValue(
                    $categories,
                    'nearest_parent_id',
                    $id
                );

                $result .= getLi($entryChildsArray);
                $result .= '</ul>';
                $result .= '</ul>';
            }
        }
    }

    $result .= '</ul>';

    return $result;
}

echo buildTree($allCategories);
