<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master;
use DB;

class MapsController extends Controller
{
    public function index(){
        $data = DB::connection('mysql1')->table('master')
        ->where('location','1')
        ->get();
        $hibobcount = DB::connection('mysql2')->table('hibob_gc_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
        // $unificountconnect = DB::connection('mysql2')->table('unifi_list_event_sr')->where('msg','like','%has connected%')->get();
        $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
        $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
        $unifi = count($unificountdisconnect)-count($unificountconnect);
        $floor = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id','1')
        ->select('master_floor.*')
        ->orderby('master_floor.sequence_number','ASC')
        ->get();
        $compname = DB::connection('mysql1')->table('master_company')
        ->where('master_company.id','1')
        ->value('company_name');
        return view('Maps',['Data'=>$data,'hibob'=>count($hibobcount),'unifi'=>$unifi,'floor'=>$floor,'compname'=>$compname]);
    }

    public function indexbycompany($id){
        if($id == 1){
            $hibobcount = DB::connection('mysql2')->table('hibob_gc_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
        }else if($id == 2){
            $hibobcount = DB::connection('mysql2')->table('hibob_kk_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_kk_traffics_src')
            ->select('ctvalue')
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else if($id == 3){
            $hibobcount = DB::connection('mysql2')->table('hibob_pbm_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_pbm_traffics_src')
            ->select('ctvalue')
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else{
            $hibobcount = [];
            $unifi = 0;
            $pc = 0;
        }
        
        $floor = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id',$id)
        ->select('master_floor.*')
        ->orderby('master_floor.sequence_number','ASC')
        ->get();
        $compname = DB::connection('mysql1')->table('master_company')
        ->where('master_company.id',$id)
        ->value('company_name');
        $data2 = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id',$id)
        ->where('master_floor.sequence_number','1')
        ->select('master_floor.id')
        ->get();
        $FloorID = 0;
        foreach($data2 as $index){
            $FloorID = $index->id;
        }
        return view('Maps',['hibob'=>count($hibobcount),'unifi'=>$unifi,'PeopleCounting'=>$pc,'floor'=>$floor,'compname'=>$compname,'FloorID'=>$FloorID]);
    }

    public function maps(){
        $data = DB::connection('mysql1')->table('master')
        ->where('location','b2')
        ->get();
        
        return view('OnlyMaps',['Data'=>$data]);
    }

    public function master(){
        $data = DB::connection('mysql1')->table('master')
        ->where('location','b2')
        ->get();
        $hibobcount = DB::connection('mysql2')->table('hibob_gc_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
        $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
        $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
        $unifi = count($unificountdisconnect)-count($unificountconnect);
        $floor = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id','1')
        ->select('master_floor.*')
        ->orderby('master_floor.sequence_number','ASC')
        ->get();
        $compname = DB::connection('mysql1')->table('master_company')
        ->where('master_company.id','1')
        ->value('company_name');
        return view('MapsMaster',['Data'=>$data,'hibob'=>count($hibobcount),'unifi'=>$unifi,'floor'=>$floor,'compname'=>$compname]);
    }

    public function mastercompany($id){
        if($id == 1){
            $hibobcount = DB::connection('mysql2')->table('hibob_gc_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
        }else if($id == 2){
            $hibobcount = DB::connection('mysql2')->table('hibob_kk_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_kk_traffics_src')
            ->select('ctvalue')
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else if($id == 3){
            $hibobcount = DB::connection('mysql2')->table('hibob_pbm_getuserinoutbytime_src')->select("nama_staff")->distinct()->get();
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' or msg like '%disconnected from%'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_pbm_traffics_src')
            ->select('ctvalue')
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else{
            $hibobcount = [];
            $unifi = 0;
            $pc = 0;
        }
        
        $floor = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id',$id)
        ->select('master_floor.*')
        ->orderby('master_floor.sequence_number','ASC')
        ->get();
        $compname = DB::connection('mysql1')->table('master_company')
        ->where('master_company.id',$id)
        ->value('company_name');
        $data2 = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_company.id','master_floor.company_id')
        ->where('master_company.id',$id)
        ->where('master_floor.sequence_number','1')
        ->select('master_floor.id')
        ->get();
        $FloorID = 0;
        foreach($data2 as $index){
            $FloorID = $index->id;
        }
        return view('MapsMaster',['hibob'=>count($hibobcount),'unifi'=>$unifi,'PeopleCounting'=>$pc,'floor'=>$floor,'compname'=>$compname,'FloorID'=>$FloorID,'CompID'=>$id]);
    }

    public function changefloor($id){
        $data = DB::connection('mysql1')->table('master_floor')
        ->join('master_company','master_floor.company_id','master_company.id')
        ->where('master_floor.id',$id)
        ->select('master_floor.maps_img','master_floor.id','master_floor.name','master_company.company_name')
        ->get();
        echo $data;
    }

    public function floor($id){
        $data = DB::connection('mysql1')->table('master')
        ->where('location',$id)
        ->get();
        echo $data;
    }

    public function save(Request $request){
        $location = (isset($request['location'])) ? $request['location'] : '';
        $typeppoint = (isset($request['typeppoint'])) ? $request['typeppoint'] : '';
        $x = (isset($request['x'])) ? $request['x'] : '';
        $y = (isset($request['y'])) ? $request['y'] : '';
        $name = (isset($request['name'])) ? $request['name'] : '';
        $link = (isset($request['link'])) ? $request['link'] : '';
        $idlink = (isset($request['idlink'])) ? $request['idlink'] : '';
        $idn = (isset($request['idn'])) ? $request['idn'] : '';
        $company = (isset($request['company'])) ? $request['company'] : '';

        if($x != null){
            DB::connection('mysql1')->table('master')->insert([            
                '_id'=>$idn,
                'link'=>$link,
                'zm_id'=>$idlink,
                'x_axis'=>$x,
                'y_axis'=>$y,
                'name'=>$name,
                'location'=>$location,
                'type'=>$typeppoint
            ]);
        }

        return redirect('/master/'.$company);
    }

    public function right(Request $request){
        $id_new = DB::connection('mysql1')->table('cctv')
        ->join('master','master.id','cctv.cctv_id_new')
        ->select('master.zm_id')
        ->first()->zm_id;

        $id_old = DB::connection('mysql1')->table('cctv')
        ->join('master','master.id','cctv.cctv_id_old')
        ->select('master.zm_id')
        ->first()->zm_id;

        $cookie_jar = tempnam("tmp", "cookie");
        //login
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://172.30.50.40/zm/api/host/login.json',
              CURLOPT_RETURNTRANSFER=> true,
              CURLOPT_ENCODING      => '',
              CURLOPT_MAXREDIRS     => 10,
              CURLOPT_TIMEOUT       => 0,
              CURLOPT_FOLLOWLOCATION=> true,
              CURLOPT_HTTP_VERSION  => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_COOKIEJAR     => $cookie_jar,
            CURLOPT_POSTFIELDS => 'user=admin2&pass=Pakuwon2023%23',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'),
            )
        );
        $response = json_decode(curl_exec($curl))->access_token;
        //turn off
        curl_setopt_array($curl, array(
            // CURLOPT_URL             => 'http://192.168.0.88/PakuwonUATTenant2/entity/Pakuwon/18.200.001/StockItem?$top=50&$skip='.$skip.'&$expand=WarehouseDetails',
            CURLOPT_URL             => 'http://172.30.50.40/zm/api/monitors/'.$id_old.'.json?token='.$response,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => 'POST',
            CURLOPT_COOKIEFILE      => $cookie_jar,
            CURLOPT_POSTFIELDS => 'Monitor[Function]=None&Monitor[Enabled]=1',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'),
            )
        );
        $data = json_decode(curl_exec($curl));
        //turn on
        curl_setopt_array($curl, array(
            // CURLOPT_URL             => 'http://192.168.0.88/PakuwonUATTenant2/entity/Pakuwon/18.200.001/StockItem?$top=50&$skip='.$skip.'&$expand=WarehouseDetails',
            CURLOPT_URL             => 'http://172.30.50.40/zm/api/monitors/'.$id_new.'.json?token='.$response,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => 'POST',
            CURLOPT_COOKIEFILE      => $cookie_jar,
            CURLOPT_POSTFIELDS => 'Monitor[Function]=Monitor&Monitor[Enabled]=1',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'),
            )
        );
        $data = json_decode(curl_exec($curl));
        // <img src="https://yourserver/zm/cgi-bin/nph-zms?scale=50&width=640p&height=480px&mode=jpeg&maxfps=5&buffer=1000&&monitor=1&auth=b5<deleted>03&connkey=36139" />
        // $link = 'http://172.30.50.40/zm/cgi-bin/nph-zms?scale=100&mode=jpeg&maxfps=5&monitor='.$id_new;
        $link = DB::connection('mysql1')->table('master')
        ->where('zm_id',$id_new)
        ->first()->	link.'&user=admin2&pass=Pakuwon2023%23';

        $new = DB::connection('mysql1')->table('cctv')
        ->value('cctv_id_new');
        return view('Right',['NewCCTV'=>$new,'Link'=>$link]);
    }

    public function delete($id){
        DB::connection('mysql1')->table('master')->where('id',$id)->delete();
        return 'true';
    }

    public function hibobdata($id){
        $name = DB::connection('mysql1')->table('master')->where('id',$id)->value('name');
        $company_id = DB::connection('mysql1')->table('master')->join('master_floor','master.location','master_floor.id')
        ->where('master.id',$id)->take(1)->value('master_floor.company_id');
        if($company_id == '1' || $company_id == 1){
            $data = DB::connection('mysql2')->table('hibob_gc_getlateingateway_src')->where('nama_gateway',$name)->orderby('waktu_alert','Desc')->distinct()->take(2)->get();
        }else if($company_id == '2' || $company_id == 2){
            $data = DB::connection('mysql2')->table('hibob_kk_getlateingateway_src')->where('nama_gateway',$name)->orderby('waktu_alert','Desc')->distinct()->take(2)->get();
        }else if($company_id == '3' || $company_id == 3){
            $data = DB::connection('mysql2')->table('hibob_pbm_getlateingateway_src')->where('nama_gateway',$name)->orderby('waktu_alert','Desc')->distinct()->take(2)->get();
        }else{
            $data= [];
        }
        
        return $data;
    }

    public function wifidatadetail($id){
        $name = DB::connection('mysql1')->table('master')
        ->where('id',$id)
        ->value('name');
        $companyid = DB::connection('mysql1')->table('master')
        ->join('master_floor','master.location','master_floor.id')
        ->where('master.id',$id)
        ->value('master_floor.company_id');
        if($companyid == '1'){
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' and ap_name = '".$name."'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
        }else if($companyid == '2'){
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%' and ap_name = '".$name."'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
        }else if($companyid == '3'){
            $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' and ap_name = '".$name."'");
            $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
            $unifi = count($unificountdisconnect)-count($unificountconnect);
        }else{
            $unifi = 0;
        }
        
        $array = array();
        $array[0]['Count'] = $unifi;
        $array[0]['Name'] = $name;
        return json_encode($array);
    }

    public function cctvclick($id){
        $old = DB::connection('mysql1')->table('cctv')->value('cctv_id_new');
        DB::connection('mysql1')->table('cctv')->update([
            'cctv_id_new'=>$id,
            'cctv_id_old'=>$old
        ]);
        $zm_id = DB::connection('mysql1')->table('master')->where('id',$id)->value('zm_id');
        return 'Monitor '.$zm_id;
    }

    public function pcclick($id){
        $idsource = DB::connection('mysql1')->table('master')
        ->where('id',$id)
        ->value('_id');
        $company_id = DB::connection('mysql1')->table('master')
        ->join('master_floor','master.location','master_floor.id')
        ->where('master.id',$id)
        ->value('master_floor.company_id');
        if($company_id == 1){
            $pc = 0;
        }else if($company_id == 2){
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_kk_traffics_src')
            ->join('people_counting_kk_ctsources_src','people_counting_kk_traffics_src.CtSourceId','people_counting_kk_ctsources_src.CtSourceId')
            ->join('people_counting_kk_tblcameralineindoor_src','people_counting_kk_ctsources_src.CtSourceId','people_counting_kk_tblcameralineindoor_src.CtSourceId')
            ->join('people_counting_kk_tbldoor_src','people_counting_kk_tblcameralineindoor_src.Doorid','people_counting_kk_tbldoor_src.Doorid')
            ->where('people_counting_kk_tbldoor_src.doorid',$idsource)
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->select('people_counting_kk_traffics_src.ctvalue')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else if($company_id == 3){
            $pc = 0;
            $pcdata = DB::connection('mysql2')->table('people_counting_pbm_traffics_src')
            ->join('people_counting_pbm_ctsources_src','people_counting_pbm_traffics_src.CtSourceId','people_counting_pbm_ctsources_src.CtSourceId')
            ->join('people_counting_pbm_tblcameralineindoor_src','people_counting_pbm_ctsources_src.CtSourceId','people_counting_pbm_tblcameralineindoor_src.CtSourceId')
            ->join('people_counting_pbm_tbldoor_src','people_counting_pbm_tblcameralineindoor_src.Doorid','people_counting_pbm_tbldoor_src.Doorid')
            ->where('people_counting_pbm_tbldoor_src.doorid',$idsource)
            ->whereRaw('LEFT(cttime, 10) = LEFT(NOW(), 10)')
            ->select('people_counting_pbm_traffics_src.ctvalue')
            ->get();
            foreach($pcdata as $list){
                $pc = $pc + $list->ctvalue;
            }
        }else{
            $pc = 0;
        }
        $pcdata = [];
        $pcdata[0]['Name']=DB::connection('mysql1')->table('master')
        ->where('id',$id)
        ->value('name');
        $pcdata[0]['Count'] = $pc;
        return json_decode(json_encode($pcdata));
    }

    public function cctv($id){
        $old = DB::connection('mysql1')->table('cctv')->value('cctv_id_new');
        if($id != $old){
            return 'Change';
        }else{
            return 'None';
        }
    }

    public function HeatMap(){
        $floorid = 4;
        return view('HeatMap',['FloorID'=>$floorid]);
    }

    public function HeatData($id){
        $data = DB::connection('mysql1')->table('master')
        ->join('master_floor','master.location','master_floor.id')
        ->where('master_floor.id',$id)
        ->where('master.type','wifi')
        ->select('master.*','master_floor.maps_img','master_floor.name as floorname','master_floor.company_id')
        ->get();
        $newdata = array();
        foreach($data as $key => $list){
            $newdata[$key]['x_axis'] = $list->x_axis;
            $newdata[$key]['y_axis'] = $list->y_axis;
            $newdata[$key]['maps_img'] = $list->maps_img;
            $name = $list->name;
            if($list->company_id == '1' || $list->company_id = 1){
                $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' and ap_name = '".$name."'");
                $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
                $unifi = count($unificountdisconnect)-count($unificountconnect);
            }else if($list->company_id == '2' || $list->company_id = 2){
                $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%' and ap_name = '".$name."'");
                $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_kk_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
                $unifi = count($unificountdisconnect)-count($unificountconnect);
            }else if($list->company_id == '3' || $list->company_id = 3){
                $unificountconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%' and ap_name = '".$name."'");
                $unificountdisconnect = DB::connection('mysql2')->select("select * from unifi_list_event_src where msg like '%has connected%'  and ap_name = '".$name."' or msg like '%disconnected from%' and ap_name = '".$name."'");
                $unifi = count($unificountdisconnect)-count($unificountconnect);
            }else{
                $unifi = 0;
            }
            $newdata[$key]['count'] = $unifi;
        }
        return json_decode(json_encode($newdata));
    }
}
