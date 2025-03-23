# Class Records Management System

## Overview
The Class Records Management System is a simple application designed to help teachers and educational institutions manage student information, attendance, grades, and academic performance in one centralized location.

## Features
- **Student Information Management**: Store and update student personal details
- **Attendance Tracking**: Record and monitor daily student attendance
- **Grade Management**: Input, calculate, and analyze student grades
- **Performance Analytics**: Generate reports on individual and class performance
- **Export Functionality**: Export records to CSV, PDF, or Excel formats

## Installation
1. Clone the repository:
   ```
   git clone https://github.com/yourusername/class-records.git
   cd class-records
   ```

2. Install dependencies:
   ```
   npm install
   ```

3. Configure your database settings in `config.js`

4. Start the application:
   ```
   npm start
   ```

## Usage
1. Login with your credentials
2. Select a class from your dashboard
3. Use the navigation menu to access different features:
   - Student List
   - Attendance
   - Gradebook
   - Reports

## Data Structure
The system organizes information hierarchically:
- Schools contain Classes
- Classes contain Students
- Students have Attendance Records and Grades

## Requirements
- Node.js v14.0 or higher
- MongoDB v4.4 or higher
- Modern web browser (Chrome, Firefox, Edge, or Safari)

## Contributing
Contributions are welcome! Please read the [contributing guidelines](CONTRIBUTING.md) before submitting pull requests.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support
For support, please open an issue in the repository or contact support@classrecords.com