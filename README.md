# LocalShare - Offline File Sharing

A simple, lightweight PHP application for sharing files on a local network without requiring internet access.

## Features

- Upload files from any device on your local network
- View and download shared files
- Clean interface with responsive design
- No internet connection required
- Automatic file management

## Requirements

- PHP 7.0 or higher
- A device to host the application (laptop, desktop, Raspberry Pi)
- Local network connection

## Installation

1. Clone or download this repository to your host device
2. Make sure the `uploads` directory has write permissions:
   ```
   chmod 755 uploads
   ```
3. Start the PHP development server:
   ```
   php -S 192.168.x.x:5050
   ```
   get your computer's IP and start the server with this IP.
## Usage

### On the host device

1. Start the PHP server as mentioned above
2. Note your local IP address (shown in the application interface)
3. Keep the server running while sharing files

### On client devices

1. Connect to the same local network as the host
2. Open a web browser and navigate to `http://HOST_IP:5050`
   (Replace HOST_IP with the actual IP address of the host device)
3. Upload files using the file selection button
4. Download files by clicking on their names in the list

## Files Structure

- `index.php` - Main interface for uploading and downloading files
- `upload.php` - Handles file uploads
- `download.php` - Manages file downloads
- `cleanup.php` - Removes older files (can be set up as a cron job)
- `files.json` - Stores metadata about uploaded files
- `uploads/` - Directory where uploaded files are stored

## Security Notice

This application is designed for use on trusted local networks only. It does not implement authentication or encryption, so do not use it for sensitive files or on public networks.

## License

This project is open source and available for personal and educational use.

## Author

Created by Pranav Titambe