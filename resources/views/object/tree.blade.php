<?php set_time_limit(900);?>
@extends('app')
 
@section('content')
<div class="container">
<h2>Структура предприятия</h2>
<div class="row">
<ul>    
        @foreach ($head as $h)
	<li>
		<h1>Глава компании</h1>
		<dl class="dl-horizontal">
  			<dt>ФИО</dt>
  			<dd>{{$h->fio}}</dd>
		</dl>
		
	</li>
        @endforeach
	@foreach ($regionalManagers as $regionalManager)
	<li>
		<h2>Региональный управляющий</h2>
		<dl class="dl-horizontal">
  			<dt>ФИО</dt>
  			<dd> {{ $regionalManager->fio}} </dd>
  			<dt>Должность</dt>
  			<dd> {{ $regionalManager->position }} </dd>
  			<dt>Дата приема</dt>
  			<dd> {{ $regionalManager->employment_date}} </dd>
  			<dt>Заработная плата</dt>
  			<dd> {{ $regionalManager->salary}} </dd>
		</dl>
		<ul>
                         
			@foreach ($branchDirectors as $branchDirector)
			@if ($branchDirector->chiefID == $regionalManager->id)
			<li>
				<h3>Директор филиала</h3>
				<dl class="dl-horizontal">
		  			<dt>ФИО</dt>
		  			<dd> {{ $branchDirector->fio}} </dd>
		  			<dt>Должность</dt>
		  			<dd> {{ $branchDirector->position}} </dd>
		  			<dt>Дата приема</dt>
		  			<dd> {{ $branchDirector->employment_date}} </dd>
		  			<dt>Заработная плата</dt>
		  			<dd> {{ $branchDirector->salary}} </dd>
		  			
				</dl>
				<ul>
					@foreach ($departmentHeads as $departmentHead)
					@if ($departmentHead->chiefID == $branchDirector->id )
                                        <li>
                                                <h4>Глава отдела</h4>
						<dl class="dl-horizontal">
							<dt>ФИО</dt>
		  			                <dd> {{ $departmentHead->fio}} </dd>
		  			                <dt>Должность</dt>
		  			                <dd> {{ $departmentHead->position}} </dd>
		  			                <dt>Дата приема</dt>
		  			                <dd> {{ $departmentHead->employment_date}} </dd>
		  			                <dt>Заработная плата</dt>
		  			                <dd> {{ $departmentHead->salary}} </dd>
						</dl>
						<h5>Сотрудники</h5>
						<table class="table">
							<thead>
								<tr>
									<th>ФИО</th>
									<th>Должность</th>
									<th>Дата ​приема ​на ​работу</th>
									<th>Размер ​заработной ​платы</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($staffMembers as $staffMember)
								@if ($staffMember->chiefID == $departmentHead->id)
								<tr>
									<td> {{ $staffMember->fio }} </td>
									<td> {{ $staffMember->position }} </td>
									<td> {{ $staffMember->employment_date}} </td>
									<td> {{ $staffMember->salary}} </td>
								</tr>
								@endif
								@endforeach
							</tbody>
						</table>
					</li>
					@endif
					@endforeach
				</ul>
			</li>
			@endif
			@endforeach
		</ul>
	</li>
	@endforeach
</ul>
</div>

</div>

@endsection

