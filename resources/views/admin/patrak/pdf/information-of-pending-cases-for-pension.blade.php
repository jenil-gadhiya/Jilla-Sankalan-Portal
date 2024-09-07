<table width="100%" cellspacing="0" border=1>
    
    <tr align="center">
        <th rowspan="2">કચેરીનું નામ</th>
        <th rowspan="2">કક્ષા</th>
        <th rowspan="2">માસનું નામ</th>
        <th rowspan="2">માસની શરૂઆતમાં બાકી કેસો</th>
        <th rowspan="2">માસ દરમ્યાન મળેલ પેરા</th>
        <th rowspan="2">કુલ કેસો</th>
        <th rowspan="2">માસના અંતે નિકાલ કરેલ કેસો</th>
        <th colspan="5">માસ અંતે આખર બાકી રહેલ કેસો</th>
        <th rowspan="2">વિશેષ નોંધ</th>
    </tr>

    <tr align="center">
        <th>૧ માસ સુધી</th>
        <th>૨ માસ સુધી</th>
        <th>૩ માસ સુધી</th>
        <th>૩ માસ ઉપર</th>
        <th>કુલ બાકી કેસો</th>
    </tr>

    <tbody align="center" id="tablebody">
        @foreach ($datas as $data)
        
            <tr align="center">
                <td>{{ $data['kacheri_name'] }}</td>
                <td>{{ $data['designation_name'] }}</td>
                <td>{{ $data['month_name'] }}</td>
                <td>{{ $data['pending_cases_at_start_of_month'] }}</td>
                <td>{{ $data['cases_during_month'] }}</td>
                <td>{{ $data['total_cases'] }}</td>
                <td>{{ $data['disposed_cases_at_end_of_month'] }}</td>
                <td>{{ $data['pending_cases_after_one_month'] }}</td>
                <td>{{ $data['pending_cases_after_two_month'] }}</td>
                <td>{{ $data['pending_cases_after_three_month'] }}</td>
                <td>{{ $data['pending_cases_above_three_month'] }}</td>
                <td>{{ $data['total_pending_cases'] }}</td>
                <td>{{ $data['remarks'] }}</td>   
            </tr>

        @endforeach  
    </tbody>
</table>