<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th>કચેરીનું નામ</th>
    <th>કક્ષા</th>
    <th>માસનું નામ</th>
    <th>શરૂઆતમાં બાકી ખાતાકીય તપાસ</th>
    <th>નવી મળેલ ખાતાકીય તપાસ</th>
    <th>કુલ ખાતાકીય તપાસ</th>
    <th>નિકાલ કરેલ ખાતાકીય તપાસ</th>
    <th>આખરે બાકી ખાતાકીય તપાસ</th>
    <th>વિશેષ નોંધ</th>
  </tr>

  <tbody align="center" id="tablebody">

    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['month_name'] }}</td>
      <td>{{ $data['initially_pending_departmental_investigation'] }}</td>
      <td>{{ $data['new_departmental_investigation'] }}</td>
      <td>{{ $data['total_departmental_investigation'] }}</td>
      <td>{{ $data['disposed_departmental_investigation'] }}</td>
      <td>{{ $data['final_pending_departmental_investigation'] }}</td>
      <td>{{ $data['remarks'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>