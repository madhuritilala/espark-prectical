@extends('layouts.admin.app')
@section('content')
	<title>Online Job Application Form</title>
	<style>
		body{
			font-family: "comic sans ms", sans serif;
			background-color: lightgreen;
			margin: 0;

		}

		h2{
			background-color: forestgreen;
			color: white;
			padding: 10px;
			text-align: center;
		}
		td{
			padding: 7px;
		}
		input{
			height: 30px;
			border-radius: 10px;
			border: none;

		}

		input:focus{
			outline: none;
			border: 1px solid forestgreen;
		}
		input:hover{
			box-shadow: 5px 5px 5px black;
		}

		.button{
			background-color: forestgreen;
			color:#fff;
			border: none;
			padding: 7px
		}

		.button:hover {
			cursor: pointer;
			box-shadow: 5px 5px 5px red;
		}
	</style>
</head>
<body>
	<h1 align="center">Online Job Applicatio Form</h1>
    {!! Form::open(['url' => route('user_form.store'), 'method' => 'POST', 'id' => 'frmmMenus']) !!}
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
         @endif
         @if (session('error'))
         <div class="alert alert-danger" role="alert">
             {{ session('error') }}
         </div>
     @endif
		<div id="personal-details">
		<h2 align="center">Personal Deatils</h2>
			<table width="100%">
				<tr>
					<td>First Name</td>
					<td>
                        <input type="text" placeholder="First Name" size="25" name="first_name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
					<td>Last Name</td>
					<td>
                        <input type="text" size="25" name="last_name" placeholder="Last Name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
				</tr>
				<tr>
					<td>Designation</td>
					<td>
                        <input type="text" placeholder="Enter Designation" size="25" name="designation">
                        @error('designation')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
					<td>Address 1</td>
					<td>
                        <input type="text" placeholder="Address 1" size="25" name="address_1">
                        @error('address_1')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
                </tr>
                <tr>
					<td>Email</td>
					<td>
                        <input type="email" placeholder="your id@gmail.com" size="25" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
					<td>Address 2</td>
					<td>
                        <input type="text" placeholder="Address 2" size="25" name="address_2">
                        @error('address_2')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
                </tr>
                <tr>
					<td>Mobile Number</td>
					<td>
                        <input type="number" placeholder="9831****" size="25" name="phone" class="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
					<td>City</td>
					<td>
                        <input type="text" placeholder="Enter City" size="25" name="city">
                        @error('city')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
                </tr>
                <tr>
					<td colspan="">State</td>
					<td>
						<select name="state">
							<option value="gujrat">Gujrat</option>
							<option value="test">Test</option>
							<option  value="test3">Test 2</option>
                        </select>
                        @error('state')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </td>
                    <td colspan="">Relation Status</td>
					<td>
						<select name="relation_status">
							<option>Single</option>
							<option>Married</option>
							<option>Other</option>
                        </select>
                        @error('relation_status')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td>
                        <input type="date" name="birth_date">
                        @error('birth_date')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
					<td>Zipcode</td>
					<td>
                        <input type="number" placeholder="Enter Zipcode" size="25" name="zipcode">
                        @error('zipcode')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
					</td>
				</tr>
				<tr>
					<td colspan="2">Gender</td>
					<td>
						<input type="radio" name="gender" value="male">Male
					</td>
					<td>
						<input type="radio" name="gender" value="feale">Female
                    </td>
                    @error('gender')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
				</tr>
			</table>
		</div>
        <!-- Educational Qualification -->
		<div id="educational-qualification">
            <h2> Educational Qualification</h2>
                <table width="100%">
                    <tr>
                        <td>Sl</td>
                        <td>Course Name</td>
                        <td>Instituited / University</td>
                        <td>Year of Passing</td>
                        <td>Marks (%)</td>
                    </tr>
                    <tr>
                        <td>SSC Detail</td>
                        <td>
                            <input type="text" size="25" name="course_name[]">

                        </td>
                        <td>
                            <input type="text" size="25" name="univercity[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="passing_year[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="percentage[]">
                        </td>
                    </tr>
                    <tr>
                        <td>HSC Detail</td>
                        <td>
                            <input type="text" size="25" name="course_name[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="univercity[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="passing_year[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="percentage[]">
                        </td>
                    </tr>
                    <tr>
                        <td>Bachelor Detail</td>
                        <td>
                            <input type="text" size="25" name="course_name[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="univercity[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="passing_year[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="percentage[]">
                        </td>
                    </tr>
                    <tr>
                        <td>Master Detail</td>
                        <td>
                            <input type="text" size="25" name="course_name[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="univercity[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="passing_year[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="percentage[]">
                        </td>
                    </tr>
                    @error('course_name.*')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    @error('univercity.*')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    @error('passing_year.*')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    @error('percentage.*')
                    <span class="invalid-feedback" role="alert" style="display:block">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </table>
            </div>

            <!-- Work Experience -->
		<div id="work-experience">
            <h2>Work Experience</h2>
                <table width="100%">
                    <tr>
                        <td>Sl No</td>
                        <td>Company Address</td>
                        <td>Work / Role</td>
                        <td>Duration (form - to)</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <input type="text" size="25" name="company_address[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="exp_designation[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_from[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_to[]">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <input type="text" size="25" name="company_address[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="exp_designation[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_from[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_to[]">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <input type="text" size="25" name="company_address[]">
                        </td>
                        <td>
                            <input type="text" size="25" name="exp_designation[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_from[]">
                        </td>
                        <td>
                            <input type="date" size="25" name="joining_date_to[]">
                        </td>
                    </tr>
                </table>
                @error('company_address.*')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                @error('exp_designation.*')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                @error('joining_date_from.*')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                @error('joining_date_to.*')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        <!-- Laungage Details -->
        <div id="address-details">
            <h2>Address Details</h2>
                <h3>A) Laungage Detail</h3>
                <table width="100%">
                    <tr>
                        <td colspan="2">Language Known</td>
                        <td>
                            <input type="checkbox" value="english" name="language[]">English
                        </td>
                        <td>
                            <input type="checkbox" value="read" name="language[]">Read
                        </td>
                        <td>
                            <input type="checkbox" value="write" name="language[]">Write
                        </td>
                        <td>
                            <input type="checkbox" value="speak" name="language[]">Speak
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="checkbox" value="english" name="language[]">Hindi
                        </td>
                        <td>
                            <input type="checkbox" value="read" name="language[]">Read
                        </td>
                        <td>
                            <input type="checkbox" value="write" name="language[]">Write
                        </td>
                        <td>
                            <input type="checkbox" value="speak" name="language[]">Speak
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="checkbox" value="english" name="language[]">Gujrati
                        </td>
                        <td>
                            <input type="checkbox" value="read" name="language[]">Read
                        </td>
                        <td>
                            <input type="checkbox" value="write" name="language[]">Write
                        </td>
                        <td>
                            <input type="checkbox" value="speak" name="language[]">Speak
                        </td>
                    </tr>
                </table>
                @error('language')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                <br><br>
            </div>

            <div>
                <h3>B) Technology Detail</h3>
                <table width="100%">

                    <tr>
                        <td colspan="2">Language Known</td>
                        <td>
                            <input type="checkbox" value="php" name="technology[]">PHP
                        </td>
                        <td>
                            <input type="checkbox" value="beginer" name="type[]">Beginer
                        </td>
                        <td>
                            <input type="checkbox" value="mideator" name="type[]">Mideator
                        </td>
                        <td>
                            <input type="checkbox" value="expert" name="type[]">Expert
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="checkbox" value="mysql" name="technology[]">MySql
                        </td>
                        <td>
                            <input type="checkbox" value="beginer" name="type[]">Beginer
                        </td>
                        <td>
                            <input type="checkbox" value="mideator" name="type[]">Mideator
                        </td>
                        <td>
                            <input type="checkbox" value="expert" name="type[]">Expert
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="checkbox" value="laravel" name="technology[]">Laravel
                        </td>
                        <td>
                            <input type="checkbox" value="beginer" name="type[]">Beginer
                        </td>
                        <td>
                            <input type="checkbox" value="mideator" name="type[]">Mideator
                        </td>
                        <td>
                            <input type="checkbox" value="expert" name="type[]">Expert
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <input type="checkbox" value="oracle" name="technology[]">Oracle
                        </td>
                        <td>
                            <input type="checkbox" value="beginer" name="type[]">Beginer
                        </td>
                        <td>
                            <input type="checkbox" value="mideator" name="type[]">Mideator
                        </td>
                        <td>
                            <input type="checkbox" value="expert" name="type[]">Expert
                        </td>
                    </tr>
                </table>
                @error('technology')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
                @error('type')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

		<!-- Other Details -->
		<div id="other-details">
		<h2>Referance Contact</h2>
			<table width="100%">
				<tr>
					<td>Name</td>
					<td>
						<input type="text" placeholder="Referance Name" size="25" name="ref_name[]">
					</td>
					<td>Contact Number</td>
					<td>
						<input type="number" placeholder="9831****" size="25" name="ref_phone[]">
                    </td>
                    <td>Relation</td>
					<td>
						<input type="text" placeholder="Relation" size="25" name="ref_relation[]">
					</td>
                </tr>
                <tr>
                    <td>Name</td>
					<td>
						<input type="text" placeholder="Referance Name" size="25" name="ref_name[]">
					</td>
					<td>Contact Number</td>
					<td>
						<input type="number" placeholder="9831****" size="25" name="ref_phone[]">
                    </td>
                    <td>Relation</td>
					<td>
						<input type="text" placeholder="Relation" size="25" name="ref_relation[]">
					</td>
				</tr>
            </table>
            @error('ref_name.*')
            <span class="invalid-feedback" role="alert" style="display:block">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            @error('ref_phone.*')
            <span class="invalid-feedback" role="alert" style="display:block">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            @error('ref_relation.*')
            <span class="invalid-feedback" role="alert" style="display:block">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div id="preferance-details">
            <h2>Preferance Detail</h2>
                <table width="100%">
                    <tr>
                        <td>Notice Period</td>
                        <td>
                            <input type="text" placeholder="Notice Period" size="25" name="notice_period">
                        </td>
                        @error('notice_period')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <td>Expacted CTC</td>
                        <td>
                            <input type="text" placeholder="Expacted CTC" size="25" name="exp_ctc">
                        </td>
                        @error('exp_ctc')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <td>Current CTC</td>
                        <td>
                            <input type="text" placeholder="Current CTC" size="25" name="current_ctc">
                        </td>
                        @error('current_ctc')
                        <span class="invalid-feedback" role="alert" style="display:block">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </tr>
                    <tr>
                        <td colspan="">Preferance Location</td>
                        <td>
                            <select name="preferance_location">
                                <option value="item1">Item 1</option>
                                <option value="item2">Item 2</option>
                                <option value="item3">Item 3</option>
                            </select>
                        </td>
                        <td colspan="">Department</td>
                        <td>
                            <select name="department">
                                <option value="development">Development</option>
                                <option value="design">Design</option>
                                <option value="marketing">Marketing</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="Submit" value="Submit" class="button">
                        </td>
                        <td>
                            <input type="Reset" value="Reset" class="button">
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
            {!! Form::close() !!}
@endsection
@section('specific_scripts')

<script>

    </script>
@endsection
