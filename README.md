# Wave Software Development Challenge


## Project Description

Imagine that this is the early days of Wave's history, and that we are prototyping
a new payroll system with an early partner. 
Our partner is going to use our webapp to determine how much each employee should be paid in each _pay period_,
 so it is critical that we get our numbers right.

The partner in question only pays its employees by the hour (there are no
salaried employees.) Employees belong to one of two _job groups_ which
determine their wages; job group A is paid $20/hr, and job group B is paid
$30/hr. Each employee is identified by a string called an "employee id" that is
globally unique in their system.

Hours are tracked per employee, per day in comma-separated value files (CSV).
Each individual CSV file is known as a "time report", and will contain:

1. A header, denoting the columns in the sheet (`date`, `hours worked`,
   `employee id`, `job group`)
1. 0 or more data rows
1. A footer row where the first cell contains the string `report id`, and the
   second cell contains a unique identifier for this report.

Our partner has guaranteed that:

1. Columns will always be in that order.
1. There will always be data in each column.
1. There will always be a well-formed header line.
1. There will always be a well-formed footer line.

An example input file named `sample.csv` is included in this repo.

### What your web-based application must do:

We've agreed to build the following web-based prototype for our partner.

1. Your app must accept (via a form) a comma separated file with the schema
   described in the previous section.
1. Your app must parse the given file, and store the timekeeping information in
   a relational database for archival reasons.
1. After upload, your application should display a _payroll report_. This
   report should also be accessible to the user without them having to upload a
   file first.
1. If an attempt is made to upload two files with the same report id, the
   second upload should fail with an error message indicating that this is not
   allowed.

The payroll report should be structured as follows:

1. There should be 3 columns in the report: `Employee Id`, `Pay Period`,
   `Amount Paid`
1. A `Pay Period` is a date interval that is roughly biweekly. Each month has
   two pay periods; the _first half_ is from the 1st to the 15th inclusive, and
   the _second half_ is from the 16th to the end of the month, inclusive.
1. Each employee should have a single row in the report for each pay period
   that they have recorded hours worked. The `Amount Paid` should be reported
   as the sum of the hours worked in that pay period multiplied by the hourly
   rate for their job group.
1. If an employee was not paid in a specific pay period, there should not be a
   row for that employee + pay period combination in the report.
1. The report should be sorted in some sensical order (e.g. sorted by employee
   id and then pay period start.)
1. The report should be based on all _of the data_ across _all of the uploaded
   time reports_, for all time.

As an example, a sample file with the following data:

<table>
<tr>
  <th>
    date
  </th>
  <th>
    hours worked
  </th>
  <th>
    employee id
  </th>
  <th>
    job group
  </th>
</tr>
<tr>
  <td>
    4/11/2016
  </td>
  <td>
    10
  </td>
  <td>
    1
  </td>
  <td>
    A
  </td>
</tr>
<tr>
  <td>
    14/11/2016
  </td>
  <td>
    5
  </td>
  <td>
    1
  </td>
  <td>
    A
  </td>
</tr>
<tr>
  <td>
    20/11/2016
  </td>
  <td>
    3
  </td>
  <td>
    2
  </td>
  <td>
    B
  </td>
</tr>
</table>

should produce the following payroll report:

<table>
<tr>
  <th>
    Employee ID
  </th>
  <th>
    Pay Period
  </th>
  <th>
    Amount Paid
  </th>
</tr>
<tr>
  <td>
    1
  </td>
  <td>
    1/11/2016 - 15/11/2016
  </td>
  <td>
    $300.00
  </td>
</tr>
  <td>
    2
  </td>
  <td>
    16/11/2016 - 30/11/2016
  </td>
  <td>
    $90.00
  </td>
</tr>
</table>

Your application should be easy to set up, and should run on either Linux or
Mac OS X. It should not require any non open-source software.

There are many ways that this application could be built; we ask that you build
it in a way that showcases one of your strengths. If you enjoy front-end
development, do something interesting with the interface. If you like
object-oriented design, feel free to dive deeper into the domain model of this
problem. We're happy to tweak the requirements slightly if it helps you show
off one of your strengths.

### Documentation:

Please modify `README.md` to add:

1. Instructions on how to build/run your application
1. A paragraph or two about what you are particularly proud of in your
   implementation, and why.

## Submission Instructions

1. Clone the repository.
1. Complete your project as described above within your local repository.
1. Ensure everything you want to commit is committed.
1. Create a git bundle: `git bundle create your_name.bundle --all`
1. Email the bundle file to [dev.careers@waveapps.com](dev.careers@waveapps.com)

## Evaluation

Evaluation of your submission will be based on the following criteria.

1. Did you follow the instructions for submission?
1. Did you document your build/deploy instructions and your explanation of what
   you did well?
1. Were models/entities and other components easily identifiable to the
   reviewer?
1. What design decisions did you make when designing your models/entities? Are
   they explained?
1. Did you separate any concerns in your application? Why or why not?
1. Does your solution use appropriate data types for the problem as described?

## How to build and run

In order to simplify the setup I have added the connection string of the cloud postgres instance which is used as the datastore.

### Install PHP
sudo apt-get update

sudo apt-get install php7.1 php7.1-mcrypt php7.1-xml php7.1-gd php7.1-opcache php7.1-mbstring php7.1-zip php7.1-pgsql

### Run the application 
php artisan serve



### Design and thought process.
Design choices : Initially I thought about developing this usign python but I thought it would be better to develop this in a language in which I have developed web application in the past.

The design here emphasizes separating the logic into different layers using MVC pattern. Pushed the report generation to the  database. layer so that the UI can present data in different formats to help the user to easily analyze the data.
Also the database migration pattern takes care of handling schema changes in a unfied way. 
These migrations are located at database/migrations/ [https://github.com/vinothchandra/se-challenge-payroll/tree/master/database/migrations]

These will be executed by the timestamp order in which they are created and these timestamps are part of the file name.
This migration creates the view which responsible for aggregating data based on the pay period
[[https://github.com/vinothchandra/se-challenge-payroll/blob/master/database/migrations/2018_04_08_003637_create_view_for_report.php]].

**Controller**
The PayrollController has the logic for parsing the files [https://github.com/vinothchandra/se-challenge-payroll/blob/master/app/Http/Controllers/PayrollController.php].

**Model**
The models are present under [https://github.com/vinothchandra/se-challenge-payroll/blob/master/app/]
The most important modal is [https://github.com/vinothchandra/se-challenge-payroll/blob/master/app/Report.php] .
This handles the logic for extracting the data for the reports.

The way it is rendered is handled through the view layer. These files are located under the resources directory.

The blade files can include other blades there by the views can reused.

All the datatable in the application is rendered in the report_table.blade.php [https://github.com/vinothchandra/se-challenge-payroll/blob/master/resources/views/report_table.blade.php]

Locations for the view files[https://github.com/vinothchandra/se-challenge-payroll/tree/master/resources/views]
[https://github.com/vinothchandra/se-challenge-payroll/blob/master/resources/views/layouts/app.blade.php] Maintains the layout of the web application.
[[https://github.com/vinothchandra/se-challenge-payroll/blob/master/resources/views/index.blade.php]]  contains the content for the home page. 

The first two columns have links in them. If you click on a report id column you see a filtered list of all salary paid in that report. Also clicking on the eployee id shows all entries for the employee.

The data could be sorted within the webpage by using the column headers.
