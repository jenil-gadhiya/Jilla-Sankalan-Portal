<table width="100%" cellspacing="0" border=1>

  <tr align="center">
    <th rowspan="2">કચેરીનું નામ</th>
    <th rowspan="2">કક્ષા</th>
    <th rowspan="2">માસનું નામ</th>
    <th rowspan="2">પાછલી બાકી રૂપિયા લાખમાં</th>
    <th rowspan="2">ચાલુ વર્ષનું નવું માંગણું રૂ. લાખમાં</th>
    <th rowspan="2">કુલ બાકી વસૂલાત રૂપિયા લાખમાં</th>
    <th rowspan="2">ગત માસ સુધીની વસૂલાત રૂ. લાખમાં</th>
    <th rowspan="2">ચાલુ માસની વસૂલાત રૂ. લાખમાં</th>
    <th rowspan="2">વર્ષ દરમ્યાન કુલ વસૂલાત રૂ. લાખમાં</th>
    <th colspan="4">માસ આખરે બાકી વસૂલાત રૂ. લાખમાં</th>
    <th rowspan="2">વિશેષ નોંધ</th>
  </tr>

  <tr align="center">
    <th>વસૂલ થઈ શકે તેવી બાકી રકમ</th>
    <th>લીટીગેશન વાળી</th>
    <th>વસૂલ ન થઈ શકે તેવી</th>
    <th>કુલ બાકી</th>
  </tr>

  <tbody align="center" id="tablebody">

    @foreach ($datas as $data)

    <tr align="center">

      <td>{{ $data['kacheri_name'] }}</td>
      <td>{{ $data['designation_name'] }}</td>
      <td>{{ $data['month_name'] }}</td>
      <td>{{ $data['recovery_left'] }}</td>
      <td>{{ $data['current_year_borrowed'] }}</td>
      <td>{{ $data['total_recovery_left'] }}</td>
      <td>{{ $data['recovey_upto_last_month'] }}</td>
      <td>{{ $data['current_month_recovery'] }}</td>
      <td>{{ $data['total_recovey_during_year'] }}</td>
      <td>{{ $data['pending_recoverable_amount_after_each_month'] }}</td>
      <td>{{ $data['pending_litigation_after_each_month'] }}</td>
      <td>{{ $data['pending_unrecoverable_amount_after_each_month'] }}</td>
      <td>{{ $data['total_recovery_left_after_each_month'] }}</td>
      <td>{{ $data['remarks'] }}</td>

    </tr>

    @endforeach
  </tbody>
</table>