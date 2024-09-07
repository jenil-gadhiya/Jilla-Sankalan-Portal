<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th rowspan="2">કચેરીનું નામ</th>
    <th rowspan="2">કક્ષા</th>
    <th rowspan="2">માસનું નામ</th>
    <th rowspan="2">છેવટના બાકી પેરા</th>
    <th rowspan="2">માસ દરમ્યાન નવા મળેલ પેરા</th>
    <th rowspan="2">કુલ પેરા</th>
    <th colspan="2">માસ દરમ્યાન નિકાલ </th>
    <th rowspan="2">માસના અંતે નિકાલ કરેલ કેસો</th>
    <th colspan="2">માસ અંતે બાકી પેરા</th>
    <th rowspan="2">વિશેષ નોંધ</th>
  </tr>

  <tr align="center">
    <th>માસ દરમ્યાન પુર્તતા કરેલ પેરા</th>
    <th>ગ્રાહ્ય થયેલ પેરા</th>
    <th>પુર્તતા કરવા પર બાકી</th>
    <th>ગ્રાહ્ય કરવા પર બાકી</th>
  </tr>

  <tbody align="center" id="tablebody">
    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['month_name'] }}</td>
      <td>{{ $data['final_pending_para'] }}</td>
      <td>{{ $data['new_received_para_during_month'] }}</td>
      <td>{{ $data['total_para'] }}</td>
      <td>{{ $data['disposal_of_para_execution_during_month'] }}</td>
      <td>{{ $data['disposal_of_para_receiving_during_month'] }}</td>
      <td>{{ $data['disposed_cases_at_end_of_month'] }}</td>
      <td>{{ $data['pending_execution_of_para_at_end_of_month'] }}</td>
      <td>{{ $data['pending_to_receive_para_at_end_of_month'] }}</td>
      <td>{{ $data['remarks'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>