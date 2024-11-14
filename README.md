# PHP Contact Manager

This is a simple command-line Contact Manager application written in PHP. It allows you to manage a list of contacts, including their names, email addresses, and phone numbers, stored in either JSON or CSV format.

## Features

- **Add** new contacts with a name, email, and phone number.
- **List** all saved contacts with their details.
- **Search** contacts by name.
- **Delete** contacts by index.
- Supports data storage in either **JSON** or **CSV** format.

## Requirements

- PHP 7.4 or higher

## Setup

1. Clone this repository or download the PHP script and place it in a directory on your system.
2. Create a file named `test.json` (or `test.csv` if you prefer CSV) in the same directory.
   - You can start with an empty file (`[]` for JSON or no content for CSV), or use sample data like below:

   **Sample `test.json`**:
   ```json
   [
       {
           "name": "Alice Johnson",
           "email": "alice.johnson@example.com",
           "phone": "555-1234"
       },
       {
           "name": "Bob Smith",
           "email": "bob.smith@example.com",
           "phone": "555-5678"
       }
   ]


Here’s a README.md for your Contact Manager project:

markdown
Copia codice
# PHP Contact Manager

This is a simple command-line Contact Manager application written in PHP. It allows you to manage a list of contacts, including their names, email addresses, and phone numbers, stored in either JSON or CSV format.

## Features

- **Add** new contacts with a name, email, and phone number.
- **List** all saved contacts with their details.
- **Search** contacts by name.
- **Delete** contacts by index.
- Supports data storage in either **JSON** or **CSV** format.

## Requirements

- PHP 7.4 or higher

## Setup

1. Clone this repository or download the PHP script and place it in a directory on your system.
2. Create a file named `contacts.json` (or `contacts.csv` if you prefer CSV) in the same directory.
   - You can start with an empty file (`[]` for JSON or no content for CSV), or use sample data like below:

   **Sample `contacts.json`**:
   ```json
   [
       {
           "name": "Alice Johnson",
           "email": "alice.johnson@example.com",
           "phone": "555-1234"
       },
       {
           "name": "Bob Smith",
           "email": "bob.smith@example.com",
           "phone": "555-5678"
       }
   ]
Usage
Run the script from the command line with:

php index.php

You’ll see a prompt (>) where you can enter commands.

Commands
add: Add a new contact by entering their name, email, and phone number when prompted.
list: Display all contacts currently saved.
search <name>: Search for contacts by name (case-insensitive).
delete <index>: Delete a contact by its index, as shown in the list.
quit: Exit the program.



Examples
Adding a Contact:


> add
Name: John Doe
Email: john.doe@example.com
Phone: 555-9999
Contact added.
Listing Contacts:


By default, the contact data is stored in a JSON file (contacts.json). To switch to CSV format, simply rename contacts.json to contacts.csv and the program will save new contacts in CSV format automatically.
