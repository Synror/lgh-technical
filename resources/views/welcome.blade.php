<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="gap-6 lg:gap-8">

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl
                            shadow-gray-500/20 dark:shadow-none ">
                            <div class="w-full">

                                <canvas id="myChart" style="width:100%;"></canvas>

                            </div>
                        </div>

                    </div>
                </div>
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="gap-6 lg:gap-8">

                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl
                            shadow-gray-500/20 dark:shadow-none ">
                        <div class="w-full">

                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full text-left text-sm font-light">
                                                <thead class="border-b font-medium text-slate-400 dark:border-neutral-500">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-4 text-center">Date</th>
                                                        <th scope="col" class="px-6 py-4 text-center">Contracts</th>
                                                        <th scope="col" class="px-6 py-4 text-center">Quotes</th>
                                                        <th scope="col" class="px-6 py-4 text-center">Weekly Hire Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($onRents as $onRent)
                                                    <tr class="text-slate-100 border-b dark:border-neutral-500">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ $onRent->gen_date }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4 text-center">{{ $onRent->contracts }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4 text-center">{{ $onRent->quotes }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4 text-center">{{ $onRent->weekly_value }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">

        var labels =  {{ Js::from($onRents->pluck('gen_date')) }};
        var contracts =  {{ Js::from($onRents->pluck('contracts')) }};
        var quotes =  {{ Js::from($onRents->pluck('quotes')) }};
        var weekly_values =  {{ Js::from($onRents->pluck('weekly_value')) }};
        var weekly_average =  {{ Js::from($weeklyAverage) }};


        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Weekly Value',
                    type: 'line',
                    backgroundColor: 'rgb(132, 99, 255)',
                    borderColor: 'rgb(132, 99, 255)',
                    data: weekly_values,
                    yAxisID: "values",
                },
                {
                    label: 'Weekly Average',
                    type: 'line',
                    backgroundColor: 'rgb(132, 255, 255)',
                    borderColor: 'rgb(132, 255, 255)',
                    data: weekly_average,
                    yAxisID: "values",
                },
                {
                    label: 'Contracts',
                    type: 'bar',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: contracts,
                    yAxisID: "counts",
                },
                {
                    label: 'Quotes',
                    type: 'bar',
                    backgroundColor: 'rgb(99, 255, 132)',
                    borderColor: 'rgb(99, 255, 132)',
                    data: quotes,
                    yAxisID: "counts",
                },
            ]
        };

        const config = {
            data: data,
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white',
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: 'white',
                            maxRotation: 45,
                            minRotation: 45 }
                    },
                    values: {
                        ticks: { color: 'white' },
                        axis: "y",
                        position: 'right',
                    },
                    counts: {
                        ticks: { color: 'white' },
                        axis: "y",
                        position: 'left',
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
</html>
