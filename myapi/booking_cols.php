<?php


$view_cols="refid,src,des,CONCAT (dt,' & ',time) as dt,time,type,fare,dfare,status,booked_site ,
date_format(tiktok,'%Y-%m-%d %H:%i:%S') as booked_time,CONCAT(booking_agent,' / ',agent_name) AS agent";
?>