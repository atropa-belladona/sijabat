<?php

function date_str($date)
{
  setlocale(LC_ALL, 'id-ID', 'id_ID');

  return strftime("%d %B %Y", strtotime($date));
}
