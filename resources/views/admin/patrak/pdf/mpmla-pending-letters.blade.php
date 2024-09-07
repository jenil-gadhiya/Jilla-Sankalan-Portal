<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th rowspan="2">કચેરીનું નામ</th>
    <th rowspan="2">કક્ષા</th>
    <td rowspan="2" style="font-weight: bold">District</td>
    <td colspan="2" style="font-weight: bold">Total</td>
    <td rowspan="2" style="font-weight: bold">Disposed</td>
    <td colspan="5" style="font-weight: bold">Pending Upto</td>
  </tr>

  <tr align="center">
    <td style="font-weight: bold">Letter pending as on 01/04/2021</td>
    <td style="font-weight: bold">Letter receive during 01/04/2021 to 30/11/21</td>
    <td style="font-weight: bold">15 days</td>
    <td style="font-weight: bold">1 Month</td>
    <td style="font-weight: bold">3 Month</td>
    <td style="font-weight: bold">6 Month</td>
    <td style="font-weight: bold">Above 6 Month</td>
  </tr>

  <tbody align="center" id="tablebody">

    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['district'] }}</td>
      <td>{{ $data['letters_pending'] }}</td>
      <td>{{ $data['letters_received'] }}</td>
      <td>{{ $data['disposed'] }}</td>
      <td>{{ $data['pending_upto_15_days'] }}</td>
      <td>{{ $data['pending_above_1_month'] }}</td>
      <td>{{ $data['pending_upto_3_month'] }}</td>
      <td>{{ $data['pending_upto_6_month'] }}</td>
      <td>{{ $data['pending_above_6_month'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>