@component('mail::message')
# Introduction

@component('mail::panel')
The following table show list of employees whoes acting period reaches 5 months and above.
@endcomponent

@component('mail::table')
| Employee           | Branch        | Position                            | From Date | Duration        |
|:------------------:|:-------------:|:-----------------------------------:|:---------:|:---------------:|
@foreach($actingEmployees as $aE)
| {{$aE->employee->user->name}} | {{$aE->employee->user->branch_id}}          | {{$aE->job_position->name}}  | {{$aE->from_date->toFormattedDateString() }}| {{$aE->from_date->diffForHumans()}} |

@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Show Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
