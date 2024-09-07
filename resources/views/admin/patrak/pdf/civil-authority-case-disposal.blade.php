<table width="100%" cellspacing="0" border=1>
    
        <tr align="center">
            <th rowspan="3">કચેરીનું નામ</th>
            <th rowspan="3">કક્ષા</th>
            <th rowspan="3">માસનું નામ</th>
            <th rowspan="3">અગાઉના માસ અંતે પડતર અરજીઓ</th>
            <th rowspan="3">માસ દરમિયાન મળેલ અરજીઓ</th>
            <th rowspan="3">કુલ</th>
            <th colspan="5">નિકાલ</th>
            <th colspan="2">બાકી</th>
            <th rowspan="3">કુલ બાકી (5-10) અને 11+12</th>
            <th rowspan="3">વિશેષ નોંધ</th>
        </tr>

        <tr align="center">
            <th colspan="2">સમય મર્યાદામાં</th>
            <th colspan="2">સમય મર્યાદા બાદ</th>
            <th rowspan="2">કુલ નિકાલ</th>
            <th rowspan="2">સમય મર્યાદાવાળી</th>
            <th rowspan="2">સમય મર્યાદા બાદની</th>
        </tr>

        <tr align="center">
            <th>હકરાત્મક</th>
            <th>નકારાત્મક</th>
            <th>હકરાત્મક</th>
            <th>નકારાત્મક</th>  
        </tr>
                    
    
    <tbody align="center" id="tablebody">

        @foreach ($datas as $data)
        
            <tr align="center">
                <td>{{ $data['kacheri_name'] }}</td>
                <td>{{ $data['designation_name'] }}</td>
                <td>{{ $data['month_name'] }}</td>
                <td>{{ $data['previous_month_pending_case'] }}</td>
                <td>{{ $data['cases_of_current_month'] }}</td>
                <td>{{ $data['total_of_previous_month_pending_case_and_cases_of_current_month'] }}</td>
                <td>{{ $data['dispose_within_deadline_positive'] }}</td>
                <td>{{ $data['dispose_within_deadline_negative'] }}</td>
                <td>{{ $data['dispose_after_deadline_positive'] }}</td>
                <td>{{ $data['dispose_after_deadline_negative'] }}</td>
                <td>{{ $data['total_dispose'] }}</td>
                <td>{{ $data['case_pending_within_deadline'] }}</td>
                <td>{{ $data['case_pending_after_deadline'] }}</td>
                <td>{{ $data['total_pending_cases'] }}</td>
                <td>{{ $data['remarks'] }}</td>   
            </tr>

        @endforeach  

    </tbody>

</table>