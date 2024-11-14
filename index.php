<?php

$contacts_file = 'test.json'; // or 'test.csv'

function addContact() {
    global $contacts_file;
    $name = readline('Name: ');
    $email = readline('Email: ');
    $phone = readline('Phone: ');
    $contact = ['name' => $name, 'email' => $email, 'phone' => $phone];
    $contacts = loadContacts();
    $contacts[] = $contact;
    saveContacts($contacts);
    echo "Contact added.\n";
}

function searchContacts($name) {
    $contacts = loadContacts();
    $matchingContacts = array_filter($contacts, function($contact) use ($name) {
        return stripos($contact['name'], $name) !== false;
    });
    return $matchingContacts;
}

function listContacts() {
    $contacts = loadContacts();
    foreach ($contacts as $index => $contact) {
        echo "$index. {$contact['name']} - {$contact['email']} - {$contact['phone']}\n";
    }
}

function deleteContact($index) {
    $contacts = loadContacts();
    if (isset($contacts[$index])) {
        unset($contacts[$index]);
        saveContacts($contacts);
        echo "Contact deleted.\n";
    } else {
        echo "Invalid contact index.\n";
    }
}

function loadContacts() {
    global $contacts_file;
    if (file_exists($contacts_file)) {
        $contents = file_get_contents($contacts_file);
        if (pathinfo($contacts_file, PATHINFO_EXTENSION) === 'json') {
            return json_decode($contents, true);
        } else {
            $contacts = [];
            $rows = str_getcsv($contents, "\n");
            foreach ($rows as $row) {
                $fields = str_getcsv($row, ',');
                $contacts[] = ['name' => $fields[0], 'email' => $fields[1], 'phone' => $fields[2]];
            }
            return $contacts;
        }
    }
    return [];
}

function saveContacts($contacts) {
    global $contacts_file;
    $data = pathinfo($contacts_file, PATHINFO_EXTENSION) === 'json'
        ? json_encode($contacts, JSON_PRETTY_PRINT)
        : implode("\n", array_map(function($contact) {
            return implode(',', $contact);
        }, $contacts));
    file_put_contents($contacts_file, $data);
}

while (true) {
    $command = readline('> ');
    $parts = explode(' ', $command);
    $action = $parts[0];
    $arg = $parts[1] ?? null;
    switch ($action) {
        case 'add':
            addContact();
            break;
        case 'search':
            $matches = searchContacts($arg);
            foreach ($matches as $index => $contact) {
                echo "$index. {$contact['name']} - {$contact['email']} - {$contact['phone']}\n";
            }
            break;
        case 'list':
            listContacts();
            break;
        case 'delete':
            deleteContact($arg);
            break;
        case 'quit':
            echo "Goodbye!\n";
            exit;
        default:
            echo "Invalid command. Try 'add', 'search <name>', 'list', 'delete <index>', or 'quit'.\n";
    }
}
?>