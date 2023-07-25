This is a laravel 10 project and requires PHP 8.1 minimum to run correctly (We recommend using PHP 8.2).

---

- Before doing anything please **create an initial commit** and push to new repository named **lgh-technical** in your personal github account.
- Make commits and pushes as often as you feel the need to.
- Ensure your final commit is on or before the given close time provided to you (normally 2.5 hours from providing the repository to you).
- Complete as much as you can.

---

## Setup

- Run Composer install
```
composer install
```
- Create a database within your local environment
- Copy the env.example file and rename to .env and apply your database configuration as needed.
- Create a new APP KEY using the below artisan command and apply this to your env file.
```
  php artisan key:generate --show
```
- Add your database credentials to the .env file
- Run the following command
```
php artisan lgh:install
```

---

## Database structure

#### on_rent

- Contains dummy product rental data for a single company over the course of 30 days.
- No timestamps are stored in this table
- Weekly value will never match the SUM of contract values related to each header line due to randomised data.

#### on_rent_lines

- Contains multiple dummy contract data lines linked to each entry in the on_rent table
- Foreign Key linked to id in the on_rent table is **header_id**
- The SUM of Contract values in this table will never match the weekly value for the related header_id (given its all random data)
---

## Notes:

- Most of the internal applications we maintain utilize the jQuery library and many plugins OR AlpineJs/Livewire.
- You may use jQuery, raw javascript or AlpineJs/Livewire. 
- For tabular data, please use the DataTables plugin (https://datatables.net/)
- You may use any other 3rd party packages, libraries and/or css/js frameworks of your choice to complete the task.
- Layouts, fonts, colour schemes if any, are your choice.
- No Models or Controllers have been created. This has been left to your decision.
- No Routes have been defined.

## The Task

### Scenario

Orders are down compared to average for this time of year due to recent events and management need to see at a glance how the business is performing in terms of current contracts, daily quotes and weekly hire amounts.

    Your task is to write a report which will help them make decisions required to keep the business afloat.

### Part 1: Generate Chart

Generate a mixed bar/line chart which clearly shows:

#### Required:

- How many contracts and quotes were generated each day within the last 3 weeks. (bar)
- The weekly hire value (line)
- Show dates in dd/mm/YYYY format on the X axis;
- Show appropriate Y Axis for each bar/line of the chart.

#### Bonus:

- Calculate and show as a line, the moving average of weekly hire.

### Part 2: Generate tabular data

#### Required

- Generate a table under the chart showing the same data in tabular format.

#### Bonus

- Provide the ability to view the contracts (onrent_lines table) for each date in tabular format via a modal / popup.

        Once finished, commit your work and push

### Part 3: Feature Request (Optional)

- Create a new sub branch of your branch
- Add a feature of your choice to the report that you feel would be beneficial to management.

        Push your new sub branch with your feature.
