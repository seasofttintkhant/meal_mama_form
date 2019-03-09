<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $dateFormat = 'U';

    protected $guarded = [];
    
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
    public function jobs()
    {
        return $this->hasMany('App\Job')->orderBy('created_at','desc');
    }

    public function getPrefectureAttribute()
    {
        $prefecture = Prefecture::find($this->prefecture_id);

        if(isset($prefecture) && !empty($prefecture))
        {
            return $prefecture->name;
        }
        return null;
    }
    public function getFacilityCategoryAttribute()
    {
        $facility_category = FacilityCategory::find($this->facility_category_id);

        if(isset($facility_category) && !empty($facility_category))
        {
            return $facility_category->name;
        }
        return null;
    }

    public static $serivcesOneArr = [
        '歯科',
        '漢方',
        '大学病院',
        '訪問リハビリ',
        '一般内科',
        '消化器内科',
        '循環器内科',
        '呼吸器内科',
        '腎臓内科',
        '血液内科',
        '心療内科',
        '神経内科',
        '内分泌内科',
        '一般外科',
        '消化器外科',
        '心臓血管外科',
        '呼吸器外科',
        '脳神経外科',
        '整形外科',
        '形成外科',
        '乳腺外科',
        '精神科',
        '眼科',
        '耳鼻咽喉科',
        '皮膚科',
        '泌尿器科',
        '放射線科',
        '救命救急',
        '美容外科・美容皮膚科',
        '小児科',
        '産婦人科',
        '麻酔科',
        '健診・検診・人間ドック',
        'リウマチ科',
        '緩和ケア科',
        '病理科',
        '在宅医療',
        '総合診療科',
        '慢性期',
        '急性期',
        '回復期',
        '終末期',
        'アレルギー科',
        'リハビリテーション科',
        'ペインクリニック'
    ];

    public static $serivcesTwoArr = [
        '漢方',
        '有床診療所',
        '無床診療所',
        '訪問リハビリ',
        '一般内科',
        '消化器内科',
        '循環器内科',
        '呼吸器内科',
        '腎臓内科',
        '血液内科',
        '心療内科',
        '神経内科',
        '内分泌内科',
        '一般外科',
        '消化器外科',
        '心臓血管外科',
        '呼吸器外科',
        '脳神経外科',
        '整形外科',
        '形成外科',
        '乳腺外科',
        '精神科',
        '眼科',
        '耳鼻咽喉科',
        '皮膚科',
        '泌尿器科',
        '放射線科',
        '救命救急',
        '美容外科・美容皮膚科',
        '小児科',
        '産婦人科',
        '麻酔科',
        '健診・検診・人間ドック',
        'リウマチ科',
        '緩和ケア科',
        '病理科',
        '在宅医療',
        '総合診療科',
        '慢性期',
        '急性期',
        '回復期',
        '終末期'
    ];

    public static $serivcesThreeArr = [
        '歯周治療',
        '入れ歯・補綴', 
        '一般歯科', 
        '審美歯科', 
        '矯正歯科', 
        '訪問歯科', 
        '小児歯科', 
        '口腔外科', 
        '予防歯科', 
        'インプラント', 
        'デンタルエステ', 
        'ホワイトニング', 
        '歯科技工所'
    ];

    public static $serivcesFourArr = [
        '整体院',
        '鍼灸院',   
        'リラクゼーション',   
        'リハビリ',   
        '運動療法',   
        '機能訓練',   
        '美容鍼',   
        '整骨院・接骨院',   
        '介護支援',   
        '訪問治療院',   
        '外傷処置'
    ];

    public static $serviceFiveArr = [
        '整体院',
        '鍼灸院',   
        'リラクゼーション',   
        'リハビリ',   
        '運動療法',   
        '機能訓練',   
        '美容鍼',   
        '整骨院・接骨院',   
        '介護支援',   
        '訪問治療院',   
        '外傷処置'
    ];

    public static $serivcesSixArr = [
        "漢方",
        "調剤併設型",
        '在宅サービス',
        'ドラッグストア',
        '調剤薬局',
        'OTC販売',
        '院内調剤'
    ];


    public static $serivceSevenArr= [
        '訪問リハビリ',
        '訪問看護',
    ];

    public static $serivcesEightArr  =[
        '幼稚園',	
        '学童保育',
        '幼児教室',   
        '認可外保育所',  
        '認定こども園',
        '認証・認可保育所',
    ];
    
    public static $serivcesNineArr  =[
        '企業',
        '学校'
    ];

    public static function uniqueArray()
    {
    //     $array = array_unique (array_merge (
    //        self::$serivcesOneArr,
    //        self::$serivcesTwoArr,
    //        self::$serivcesThreeArr,
    //        self::$serivcesFourArr,
    //        self::$serviceFiveArr,
    //        self::$serivcesSixArr,
    //        self::$serivceSevenArr,
    //        self::$serivcesEightArr,
    //        self::$serivcesNineArr
    //     ));

        
    //     foreach($array as $key => $value){
    //         $data[$key]['name'] = $value;
    //     }
    // ServiceType::truncate();
    // ServiceType::insert($data);
    // //    $data =ServiceType::whereIn('name',self::$serivcesNineArr)->pluck('id')->toArray();
    // //    foreach($data as $d => $a)
    // //    {
    // //        $ids[]=$a;
    // //     }
    // //     $id_string = implode(',',$ids);
    // //     dd($id_string);
      
    }
    
}
