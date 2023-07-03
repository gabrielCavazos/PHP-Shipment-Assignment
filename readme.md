## How to Run the PHP Shipment Assignment Application
To run the PHP application that assigns shipment destinations to drivers and calculates the total suitability score, follow these instructions:

- Open a command-line interface or terminal.

- Navigate to the directory where the script.php file and input files (shipments.txt and drivers.txt) are located.

- Run the PHP script by executing the following command:

```
php script.php
```

The program will process the input files, calculate the total suitability score, and display the results on the command line. The output will include the total suitability score and the shipment-driver assignment.

If you want to run the test cases you can run

```
php tests.php
```

***Note: Make sure you have PHP installed on your system and added to your system's PATH variable to run the PHP script from the command line.***

### Installing PHP on Different Operating Systems
#### For Windows:
- Visit the PHP for Windows download page: https://windows.php.net/download/

- Choose the appropriate PHP version for your system architecture (x64 or x86). Select the thread-safe version if you are unsure.

- Download the ZIP package of PHP.

- Extract the contents of the ZIP package to a directory of your choice (e.g., C:\php).

- Rename the file php.ini-development to php.ini.

- Open the php.ini file in a text editor and make the following changes:

```
;extension_dir
extension_dir = "C:\php\ext"

;extension=curl
```

- Add the PHP installation directory (e.g., C:\php) to the system's PATH variable:

    - Open the System Properties dialog by pressing Win + Pause/Break or right-clicking on "This PC" and selecting "Properties".
    - Click on "Advanced system settings".
    - In the System Properties dialog, click on the "Environment Variables" button.
    - In the "Environment Variables" dialog, find the "Path" variable under "System variables" and click "Edit".
    - Add a new entry with the path to your PHP installation directory (e.g., C:\php), and click "OK" to save the changes.
    - Open a new command prompt window or restart your existing command prompt.

- Verify the PHP installation by running the following command:

```
php -v
```

#### For macOS:

- Open a terminal.

- Install Homebrew if you haven't already. Follow the instructions on the Homebrew website: https://brew.sh/

- Install PHP by running the following command:

```
brew install php
```

- Wait for the installation to complete. Homebrew will download and install PHP and its dependencies.

- Verify the PHP installation by running the following command:

```
php -v
```

#### For Linux (Ubuntu/Debian):
- Open a terminal.

- Update the package list by running the following command:


```
sudo apt update
```

- Install PHP by running the following command:

```
sudo apt install php
```

- Wait for the installation to complete. The package manager will download and install PHP and its dependencies.

- Verify the PHP installation by running the following command:

```
php -v
```


Once you have PHP installed and added to your system's PATH variable, you can follow the previous instructions to run the PHP script 