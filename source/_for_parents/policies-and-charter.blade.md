---
title: Policies and Charter
date: 2019-04-02T01:25:51.280Z
---
SCHOOL CHARTER

Our School Charter is updated on an annual basis and is available below:



View the 2018 Whanganui High School Charter



SCHOOL REPRESENTATIVES

Students representing Whanganui High School in any co- curricular activity are expected to positively uphold and enhance the ‘Life’ values of Whanganui High School whilst preparing for, participating in, or attending any event.



Whanganui High School representatives are bound by the Smoke, Drug, and Alcohol Free conditions under which all events are managed



Read the full criteria for representing Whanganui High School



SCHOOL POLICIES

@foreach($policies as $policy)
** {{$policy->title}}
@foreach($policy->policyAreas as $area)
- {{$area["policyArea"]}}
@foreach($area["policies"] as $policyDoc)
    - [{{$policyDoc["title"]}}]({{$policyDoc["document"]}})
@endforeach
@endforeach
@endforeach