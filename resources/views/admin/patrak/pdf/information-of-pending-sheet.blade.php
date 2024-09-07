<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th>કચેરીનું નામ</th>
    <th>કક્ષા</th>
    <th>માસનું નામ</th>
    <th>માસની શરૂઆતમાં બાકી કાગળો </th>
    <th>માસ દરમ્યાન નવા મળેલ કાગળો</th>
    <th>કુલ નિકાલ કરવાપાત્ર કાગળો</th>
    <th>માસ દરમ્યાન નિકાલ કરેલ કાગળો</th>
    <th>માસ અંતે બાકી કાગળો </th>
    <th>15 દિવસ ઉપરના કાગળો</th>
    <th>વિશેષ નોંધ</th>
  </tr>

  <tbody align="center" id="tablebody">

    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['month_name'] }}</td>
      <td>{{ $data['sheets_pending_at_start_of_month'] }}</td>
      <td>{{ $data['new_sheets_received_during_month'] }}</td>
      <td>{{ $data['total_sheets_to_be_disposed'] }}</td>
      <td>{{ $data['sheets_disposed_during_month'] }}</td>
      <td>{{ $data['sheets_pending_at_end_of_month'] }}</td>
      <td>{{ $data['sheets_pending_above_15_days'] }}</td>
      <td>{{ $data['remarks'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>