<x-admin-master>
    @section('content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>માસિક પત્રકો ({{ $month }})</center></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                               

                        {{-- Checks for logedin user is admin or not --}}
                        @if (Auth::user()->isAdmin())
                            
                            <tr align="center">
                                <th>ક્રમ</th>
                                <th>વિગત</th>
                                <th>એક્શન</th>
                            </tr>

                            <tbody align="center">
                                <tr>
                                    <td>૧</td>
                                    <td>નાગરિક અધિકાર (ખરડા) અન્વયે મળેલ અરજીઓના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.civil')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.civil')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૨</td>
                                    <td>પત્રક-3 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : બાકી પેન્શન કેસોના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.pending_cases_pension')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.pending_cases_pension')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૩</td>
                                    <td>પત્રક-4 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : એ. જી. ઓડીટ બાકી પેરાની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.ag_audit')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.ag_audit')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૪</td>
                                    <td>પત્રક-5 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ :પડતર કાગળોની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.pending_sheet')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.pending_sheet')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૫</td>
                                    <td>પત્રક-6 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : સરકારી બાકી વસૂલાતની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.pending_recovery')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.pending_recovery')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૬</td>
                                    <td>પત્રક-7 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : ખાતાકીય તપાસની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.depatmental_investigation')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.depatmental_investigation')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૭</td>
                                    <td>આરટીઆઇ અરજી અંગેનું માસિક પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.rti_application')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.rti_application')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૮</td>
                                    <td>આરટીઆઇ અપીલ અંગેનું માસિક પત્રક : સુરત જિલ્લો</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.rti_appeal')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.rti_appeal')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                                <tr>
                                    <td>૯</td>
                                    <td>MP-MLA Pending Letters</td>
                                    <td>    
                                        {{-- <a href="{{route('patrak.add.mpmla')}}">ઉમેરો</a> |  --}}
                                        <a href="{{route('admin.patrak.mpmla')}}">યાદી</a>                                   
                                    </td>
                                </tr>
                            </tbody>

                        @elseif (Auth::user()->isUser())

                            {{-- Check if User does not have permission to fill patrak --}}
                            @if ($sorted_patrak != null)
                                <tr align="center">
                                    <th>ક્રમ</th>
                                    <th>વિગત</th>
                                    <th>એક્શન</th>
                                </tr>
                                <tbody align="center">                                        
                                            
                                    {{-- Determine which patrak should be filled or view by User --}}
                                    @foreach ($sorted_patrak as $u_patrak)
                                        
                                        @if ($u_patrak == 1)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>નાગરિક અધિકાર (ખરડા) અન્વયે મળેલ અરજીઓના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.civil')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.civil')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 2)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>પત્રક-3 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : બાકી પેન્શન કેસોના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.pending_cases_pension')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.pending_cases_pension')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 3)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>પત્રક-4 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : એ. જી. ઓડીટ બાકી પેરાની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.ag_audit')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.ag_audit')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 4)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>પત્રક-5 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ :પડતર કાગળોની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.pending_sheet')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.pending_sheet')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 5)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>પત્રક-6 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : સરકારી બાકી વસૂલાતની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.pending_recovery')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.pending_recovery')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 6)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>પત્રક-7 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : ખાતાકીય તપાસની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.depatmental_investigation')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.depatmental_investigation')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 7)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>આરટીઆઇ અરજી અંગેનું માસિક પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.rti_application')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.rti_application')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 8)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>આરટીઆઇ અપીલ અંગેનું માસિક પત્રક : સુરત જિલ્લો</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.rti_appeal')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.rti_appeal')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($u_patrak == 9)
                                            <tr>
                                                <td>{{ $counter++; }}</td>
                                                <td>MP-MLA Pending Letters</td>
                                                <td>    
                                                    <a href="{{route('patrak.add.mpmla')}}">ઉમેરો</a> | 
                                                    <a href="{{route('admin.patrak.mpmla')}}">યાદી</a>                                   
                                                </td>
                                            </tr>
                                        @endif  

                                    @endforeach
                                                                                                
                                </tbody>
                                
                            @else
                                {{-- This will Display message if patrak is not selected --}}
                                @include('sweetalert::alert')
                            @endif

                        @endif

                    </table>
                </div>
            </div>
        </div>
        
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>