<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองที่จอดรถ</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            background-color: #011b60;
        }

        header {
            display: flex;
            background-color: #ffffff;
            color: #011b60;
            box-shadow: 0px 2px 15px black;
            padding: 15px;
            width: 100%;
            justify-content: center;
        }

        header h3 {
            width: 70%;
        }

        header form {
            margin-left: auto;
        }

        form #hourly-group .day {
            display: flex;
        }

        form #day-group div,
        form #monthly-group div {
            margin: 20px;
        }

        form #hourly-group .day div {
            margin: 10px;
            display: block;
        }

        .shipping-type {
            display: flex;
        }

        form#main {
            color: #011b60;
            width: 50%;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
        }

        form#main h3 {
            text-align: center;
        }

        form#main .shipping-type div {
            margin-left: auto;
            margin-right: auto;
        }

        form#main #hourly-group {
            display: block;
        }

        form#main #hourly-group, #day-group, #monthly-group {
            display: none;
            margin-left: 90px;
        }

        .vehicle-type {
            margin: 20px;
            display: block;
            padding-left: 70px;
        }

        .shipping-type div {
            margin-right: 20px;
        }

        #subbtn {
            width: 60px;
            background-color: #011b60;
            color: #ffffff;
            border: 0px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
        }

        #motorcycleForm, #carForm select {
            width: 100px;
        }

        #motorcycleForm, #carForm {
            display: none;
            transition: display 0.5s ease-in-out;
        }

        table {
            color: #ffffff;
            border: 1px solid white;
        }
    </style>

    <script>
        function showForm(type) {
            const hourlyGroup = document.getElementById('hourly-group');
            const dayGroup = document.getElementById('day-group');
            const monthlyGroup = document.getElementById('monthly-group');

            hourlyGroup.style.display = 'none';
            dayGroup.style.display = 'none';
            monthlyGroup.style.display = 'none';

            if (type === 'hourly') {
                hourlyGroup.style.display = 'block';
            } else if (type === 'day') {
                dayGroup.style.display = 'block';
            } else if (type === 'monthly') {
                monthlyGroup.style.display = 'block';
            }
        }

        function showvehicleForm(type) {
            const carForm = document.getElementById('carForm');
            const motorcycleForm = document.getElementById('motorcycleForm');

            motorcycleForm.style.display = 'none';
            carForm.style.display = 'none';

            if (type === 'รถยนต์') {
                carForm.style.display = 'block';
            } else if (type === 'มอเตอร์ไซต์') {
                motorcycleForm.style.display = 'block';
            }
        }

        window.onload = function() {
            showForm('hourly');
        };
    </script>
</head>
<body>
    <header>
        <h3>ParkingZone</h3>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form id="main" action="{{ route('dashboard.create') }}" method="POST">
        <h3>ค้นหาที่จอดรถ</h3>
        @csrf
        <div class="shipping-type">
            <div>
                <input type="radio" id="hourly" name="shipping-type" value="hourly" checked onchange="showForm('hourly')">
                <label for="hourly">รายชั่วโมง</label>
            </div>
            <div>
                <input type="radio" id="day" name="shipping-type" value="day" onchange="showForm('day')">
                <label for="day">รายวัน</label>
            </div>
            <div>
                <input type="radio" id="monthly" name="shipping-type" value="monthly" onchange="showForm('monthly')">
                <label for="monthly">รายเดือน</label>
            </div>
        </div>

        <div id="hourly-group">
            <div class="vehicle-type">
                <select name="vehicle-type" id="vehicle-type" onchange="showvehicleForm(this.value)">
                    <option value="">เลือกประเภท</option>
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="มอเตอร์ไซต์">มอเตอร์ไซต์</option>
                </select>
            </div>
            {{-- <div id="carForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div>
            <div id="motorcycleForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div>
                <label for="date-entry">วันที่เข้า:</label>
                <input type="datetime-local" name="date-entry" required>
            </div>
            <div>
                <label for="date-exit">วันที่ออก:</label>
                <input type="datetime-local" name="date-exit" required>
            </div>

        </div>

        <div id="day-group">

            <div class="vehicle-type">
                <select name="vehicle-type" id="vehicle-type" onchange="showvehicleForm(this.value)">
                    <option value="">เลือกประเภท</option>
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="มอเตอร์ไซต์">มอเตอร์ไซต์</option>
                </select>
            </div>
            {{-- <div id="carForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div>
            <div id="motorcycleForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div>
                <label for="date-entry">วันที่เข้า:</label>
                <input type="datetime-local" name="date-entry" required>
            </div>
            <div>
                <label for="date-exit">วันที่ออก:</label>
                <input type="datetime-local" name="date-exit" required>
            </div>

        </div>

        <div id="monthly-group">

            <div class="vehicle-type">
                <select name="vehicle-type" id="vehicle-type" onchange="showvehicleForm(this.value)">
                    <option value="">เลือกประเภท</option>
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="มอเตอร์ไซต์">มอเตอร์ไซต์</option>
                </select>
            </div>
            <div id="carForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div>
            <div id="motorcycleForm">
                <select name="carInfo">
                    <option value="">เลือกหมายเลขทะเบียน</option>
                    @foreach($carInfos as $carInfo)
                        <option value="{{ $carInfo->license_plate }}">{{ $carInfo->license_plate }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="date-entry">วันที่เข้า:</label>
                <input type="datetime-local" name="date-entry" required>
            </div>
            <div>
                <label for="date-exit">วันที่ออก:</label>
                <input type="datetime-local" name="date-exit" required>
            </div>
        </div>

        <button type="submit" id="subbtn">สร้าง</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ประเภทการจอง</th>
                <th>ประเภทของรถ</th>
                <th>หมายเลขทะเบียน</th>
                <th>วันที่เข้า</th>
                <th>วันที่ออก</th>
                <th>ระยะเวลา</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dashboards as $dashboard)
                <tr>
                    <td>{{ $dashboard->shippingType }}</td>
                    <td>{{ $dashboard->vehicleType }}</td>
                    <td>{{ $dashboard->carInfo->license_plate ?? 'N/A' }}</td>
                    <td>{{ $dashboard->dateEntry }}</td>
                    <td>{{ $dashboard->dateExit }}</td>
                    <td>{{ $dashboard->duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>