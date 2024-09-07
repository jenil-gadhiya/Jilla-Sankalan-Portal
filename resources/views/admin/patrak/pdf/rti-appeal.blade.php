<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th rowspan="2">કચેરીનું નામ</th>
    <th rowspan="2">કક્ષા</th>
    <th rowspan="2">માસનું નામ</th>
    <th rowspan="2">માસની શરૂઆતમાં પડતર આરટીઆઇ અપીલ</th>
    <th rowspan="2">માસ દરમિયાન મળેલ અપીલ</th>
    <th rowspan="2">કુલ</th>
    <th colspan="2">તબદીલ</th>
    <th colspan="3">નિકાલ કરેલ અરજીઓ</th>
    <th rowspan="2">મંજૂર કરેલ અપીલનું કારણ</th>
    <th colspan="3">માસના અંતે પડતર</th>
    <th rowspan="2">વિશેષ નોંધ</th>
  </tr>

  <tr align="center">
    <th>અંશત તબદીલ</th>
    <th>સંપૂર્ણ તબદીલ</th>
    <th>મંજૂર</th>
    <th>નામંજૂર</th>
    <th>કુલ</th>
    <th>સમય મર્યાદા અંદર</th>
    <th>સમય મર્યાદા બહાર</th>
    <th>કુલ બાકી અરજીઓ</th>
  </tr>

  <tbody align="center" id="tablebody">

    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['month_name'] }}</td>
      <td>{{ $data['appeal_pending_at_beginning_of_month'] }}</td>
      <td>{{ $data['appeal_received_during_month'] }}</td>
      <td>{{ $data['total_pending_and_receive_appeals'] }}</td>
      <td>{{ $data['partially_transfered'] }}</td>
      <td>{{ $data['fully_transfered'] }}</td>
      <td>{{ $data['approved_disposed_appeals'] }}</td>
      <td>{{ $data['unapproved_disposed_appeals'] }}</td>
      <td>{{ $data['total_approved_and_unapproved_disposed_appeals'] }}</td>
      <td>{{ $data['reason_to_approve_appeal'] }}</td>
      <td>{{ $data['appeals_pending_within_time_limit_at_the_end_of_month'] }}</td>
      <td>{{ $data['appeals_pending_out_of_time_limit_at_the_end_of_month'] }}</td>
      <td>{{ $data['total_pending_appeals'] }}</td>
      <td>{{ $data['remarks'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>