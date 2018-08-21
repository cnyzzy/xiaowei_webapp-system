<?php


class ReadCode
{
	public function setImage($Image)
	{
		$this->ImagePath = $Image;
	}
	public function getData()
	{
		return $this->data;
	}

	
	public function getResult()
	{
		return $this->DataArray;
	}
	public function getHec()
	{
		$res = imagecreatefromgif($this->ImagePath);
		$size = getimagesize($this->ImagePath);
		$data = array();
		 $imageArr = array();
        for($y = 0; $y < $size[1]; ++$y){
            for($x = 0; $x < $size[0]; ++$x){
                $rgb      = imagecolorat($res , $x , $y );
                $rgbArray = imagecolorsforindex( $res , $rgb );
                if ($rgbArray['red'] < 110 && $rgbArray['green'] < 120 && $rgbArray['blue'] > 50) {
                    $data[$y][$x] = '1';
                } else {
                    $data[$y][$x] = '0';
                }
            }
        }
	$array=$data;
for($y=0; $y < $size[1]; ++$y)
		{
			for($x=0; $x < $size[0]; ++$x)
			{
                if ($array[$y][$x] == 1)
                {
                    $num = 0;
                    // 上
                    if (isset( $array[$y - 1][$x] ))
                    {
                        $num = $num + $array[$y - 1][$x];
                    }
                    // 下
                    if (isset( $array[$y + 1][$x] ))
                    {
                        $num = $num + $array[$y + 1][$x];
                    }
                    // 左
                    if (isset( $array[$y][$x - 1] ))
                    {
                        $num = $num + $array[$y][$x - 1];
                    }
                    // 右
                    if (isset( $array[$y][$x + 1] ))
                    {
                        $num = $num + $array[$y][$x + 1];
                    }
                    // 上左
                    if (isset( $array[$y - 1][$x - 1] ))
                    {
                        $num = $num + $array[$y - 1][$x - 1];
                    }
                    // 上右
                    if (isset( $array[$y - 1][$x + 1] ))
                    {
                        $num = $num + $array[$y - 1][$x + 1];
                    }
                    // 下左
                    if (isset( $array[$y + 1][$x - 1] ))
                    {
                        $num = $num + $array[$y + 1][$x - 1];
                    }
                    // 下右
                    if (isset( $array[$y + 1][$x + 1] ))
                    {
                        $num = $num + $array[$y + 1][$x + 1];
                    }
                    if ($num < 3)
                    {//如果周围的像素数量小于3（也就是为1，或2）则判定为噪点，去除
                        $array[$y][$x] = '0';
                    }
                    else
                    {
                        $array[$y][$x] = '1';
                    }
                }
            }
        }
	/*for($y=0; $y < $size[1]; ++$y)
		{
			for($x=0; $x < $size[0]; ++$x)
		{
			     if ($array[$y][$x]) {
                        echo '◆';
                    } else {
                        echo '◇';
                    }
                }
                echo '<br/>';
			
		}*/
		$this->DataArray = $array;
		$this->ImageSize = $size;
	
	}
    public function showCharWeb($charCollection)
    {
        echo '<div style="float: left;line-height: 10px;margin-left: 20px;">';

        foreach ($charCollection as $key => $char) {
            foreach ($char as $y => $row) {
                foreach ($row as $x => $value) {
                    if ($value) {
                        echo '◆';
                    } else {
                        echo '◇';
                    }
                }
                echo '<br/>';
            }
        }
        echo '</div>';
    }
	
	public function bmp2jpeg($file){
		$res = $this->imagecreatefrombmp($file);
		imagejpeg($res,$file.".jpeg");
	}
	public function getXCoordinate()
	{
		    $beforeLine = 
			array(0 , 17 , 29 , 41);
        $afterLine  = array(16 , 28 , 40 , 54);

        $xArr  = $this->getCutBeforeCol( $this->DataArray , $this->ImageSize[0] , $this->ImageSize[1] , $beforeLine );
        $x_Arr = $this->getCutAfterCol($this->DataArray, $this->ImageSize[0] , $this->ImageSize[1], $afterLine );

        //合并xArr和x_Arr
        $xAllArr = array();
        foreach($xArr as $key => $x){
            $xAllArr[] = $xArr[$key];
            $xAllArr[] = $x_Arr[$key];
        }
		return( $xAllArr);
	
	}
	
		public function getYCoordinate( $xAllArr , $height , $noiseCancelArr ){
        $yArr  = $this->getCutBeforeRow( $xAllArr , $height , $noiseCancelArr );
        $y_Arr = $this->getCutAfterRow( $xAllArr , $height , $noiseCancelArr );

        //合并 $yArr 和 $y_Arr
        $yAllArr = array();
        foreach($yArr as $key => $x){
            $yAllArr[] = $yArr[$key];
            $yAllArr[] = $y_Arr[$key];
        }

        return $yAllArr;
    }
	  /**
     * @param $noiseCancelArr
     * @param $width
     * @param $height
     * @param $beforeLine
     * @return array
     */
    public function getCutBeforeCol( $noiseCancelArr , $width , $height , $beforeLine ){
        $xArr = array();
      foreach($beforeLine as $bLine){
            for($x = $bLine; $x < $width; ++$x){
                $sum = 0;
                for($y = 0; $y < $height; ++$y){
                    $sum += (int)$noiseCancelArr[$y][$x];
                }
                if ($sum > 1) {
                    $xArr[] = $x;
                    break;
                }
            }
        }
        return $xArr;

    }

    /**
     * @param $noiseCancelArr
     * @param $width
     * @param $height
     * @param $afterLine
     * @return array
     */
    public function getCutAfterCol( $noiseCancelArr , $width , $height , $afterLine ){
        $x_Arr = array();;
      foreach($afterLine as $aLine){
            for($x = $aLine; $x < $width; --$x){
                $sum = 0;
                for($y = 0; $y < $height; ++$y){
                    $sum += (int)$noiseCancelArr[$y][$x];
                }
                if ($sum > 1) {
                    $x_Arr[] = $x;
                    break;
                }
            }
        }
        return $x_Arr;

    }

    /**
     * @param $xAllArr
     * @param $height
     * @param $noiseCancelArr
     * @return array
     */
    public function getCutBeforeRow( $xAllArr , $height , $noiseCancelArr ){
        $yArr = array();
       for($i = 0; $i < 4; ++$i){
            for($y = 0; $y < $height; ++$y){
                $sum = 0;
                for($x = $xAllArr[$i*2]; $x <= $xAllArr[$i*2 + 1]; ++$x){
                    $sum += (int)$noiseCancelArr[$y][$x];
                }
                if ($sum > 0) {
                    $yArr[] = $y;
                    break;
                }
            }
        }
        return $yArr;
    }

    /**
     * @param $xAllArr
     * @param $height
     * @param $noiseCancelArr
     * @return array
     */
    public function getCutAfterRow( $xAllArr , $height , $noiseCancelArr ){
        $y_Arr = array();
       for($i = 0; $i < 4; ++$i){
            for($y = $height - 1; $y > 0; --$y){
                $sum = 0;
                for($x = $xAllArr[$i*2]; $x <= $xAllArr[$i*2 + 1]; ++$x){
                    $sum += (int)$noiseCancelArr[$y][$x];
                }
                if ($sum > 0) {
                    $y_Arr[] = $y;
                    break;
                }
            }
        }
        return $y_Arr;
    }

    /**
     * @param $char
     * @return array
     */
    public function getCharAllXY( $char ){
        $x  = $char['x'][0];
        $x_ = $char['x'][1];
        $y  = $char['y'][0];
        $y_ = $char['y'][1];

        return compact( 'x' , 'x_' , 'y' , 'y_' );
    }
	    public function getPointPositionInArea($x_, $y_, $beforeX, $beforeY)
    {
        $x = (int)$x_ - (int)$beforeX;
        $y = (int)$y_ - (int)$beforeY;
        return compact('x', 'y');
    }
	public function cut( $noiseCancelArr , $coordinate ){
        $charPixelCollection = array(
            'char0' => array(
                'x' => array() , 'y' => array() , 'pixel' => array() ,
            ) ,
            'char1' => array(
                'x' => array() , 'y' => array() , 'pixel' => array() ,
            ),
            'char2' => array(
                'x' => array() , 'y' => array() , 'pixel' => array() ,
            ) ,
            'char3' => array(
                'x' => array() , 'y' => array() , 'pixel' => array() ,
            ) ,
        );

        for($i = 0; $i < 4; ++$i){
            $charPixelCollection["char$i"]['x'] = array($coordinate['xAllArr'][$i*2] , $coordinate['xAllArr'][$i*2 + 1]);
            $charPixelCollection["char$i"]['y'] = array($coordinate['yAllArr'][$i*2] , $coordinate['yAllArr'][$i*2 + 1]);
        }
//PRINT_r( $charPixelCollection);
        foreach($noiseCancelArr as $y => $row){
            foreach($row as $x => $value){
                for($i = 0; $i < 4; ++$i){
                    $charCOORD = $this->getCharAllXY( $charPixelCollection["char$i"] );
                    if ($this->isInArea( $x , $y , $charCOORD['x'] , $charCOORD['x_'] , $charCOORD['y'] , $charCOORD['y_'] )) {
                        $position = $this->getPointPositionInArea( $x , $y , $charCOORD['x'] , $charCOORD['y'] );
                        $charPixelCollection["char$i"]['pixel'][$position['y']][$position['x']] = $noiseCancelArr[$y][$x];
                    }
                }

            }
        }
        return $charPixelCollection;
    }
	    public function isInArea($x, $y, $beforeX, $afterX, $beforeY, $afterY)
    {
        $flag = 0;
        if ($x >= $beforeX && $x <= $afterX) {
            ++$flag;
        }
        if ($y >= $beforeY && $y <= $afterY) {
            ++$flag;
        }

        if ($flag == 2) {
            return true;
        } else {
            return false;
        }

    }
	  public function twoD2oneDArrayCol(array $twoDArray)
    {
        $str = '';
        $rowNumber = count($twoDArray);
        $colNumber = count($twoDArray[0]);

        for ($x = 0; $x < $colNumber; ++$x) {
            for ($y = 0; $y < $rowNumber; ++$y) {
                $str .= $twoDArray[$y][$x];
            }
        }
        return $str;
    }
	public function filterInfo()
	{
		           $xAllArr = $this->getXCoordinate();
        $yAllArr = $this->getYCoordinate( $xAllArr ,$this->ImageSize[1] , $this->DataArray );
		//PRINT_r($yAllArr);
   $pixelCollection = $this->cut( $this->DataArray , compact( 'xAllArr' , 'yAllArr' )   );
        $charPixedCollection = array();
        foreach($pixelCollection as $charPixel){
            $charPixedCollection[] = $charPixel['pixel'];
        }
		 //$this->showCharWeb($charPixedCollection);
		  foreach ($charPixedCollection as $charPixed) {
            $oneDCharStrArr[] = $this->twoD2oneDArrayCol($charPixed);
			  
        }
				
         $result = '';
        foreach($oneDCharStrArr as $oneDChar){
            //是否记录识别详情
            if (true) {
                $result .= $this->getHighestSimilarityResultNoteDetail( $oneDChar , $this->Keys , $this->resultContainer );
            } else {
                $result .= $this->getHighestSimilarityResult( $oneDChar , $this->Keys );
            }
        }

	 return $result;
	}
	  public function getHighestSimilarityResultNoteDetail( $oneDChar , $dictionary , $resultContainer ){
     $nowBest = array(
            'score' => 0 ,
            'char'  => null ,
       );
        foreach($dictionary as $key => $sample){
            similar_text( $oneDChar , $sample['rowStr'] , $percent );
            $flag = 0;
            if ($percent > $nowBest['score']) {
                $nowBest['score'] = $percent;
                $nowBest['char']  = $sample['char'];
                $flag             = 1;
            }
            $judge = array(
                'percent'      => $percent ,
                'char'         => $sample['char'] ,
                'sampleRowStr' => $sample['rowStr'] ,
                'oneDChar'     => $oneDChar ,
                'upScore'      => $flag ? true : false ,
            );
            $this->setJudgeDetails( $key , $judge );

            if ($nowBest['score'] > 96) {
                break;
            }
        }
        $this->setResultArr=$nowBest;

        return $nowBest['char'];
    }
  public function getHighestSimilarityResult( $oneDChar , $dictionary ){
        $nowBest = array(
            'score' => 0 ,
            'char'  => null ,
       );
        foreach($dictionary as $key => $sample){
            similar_text( $oneDChar , $sample['rowStr'] , $percent );
            if ($percent > $nowBest['score']) {
                $nowBest['score'] = $percent;
                $nowBest['char']  = $sample['char'];
            }

            if ($nowBest['score'] > 96) {
                break;
            }
        }

        return $nowBest['char'];
    }
	public function Draw()
	{
		for($i=0; $i<$this->ImageSize[1]; ++$i)
		{
			echo implode("",$this->DataArray[$i]);
		    echo "\n";
		}
	}
	public function imagecreatefrombmp($file)
	{
        global  $CurrentBit, $echoMode;

        $f=fopen($file,"r");
        $Header=fread($f,2);

        if($Header=="BM")
        {
                $Size=$this->freaddword($f);
                $Reserved1=$this->freadword($f);
                $Reserved2=$this->freadword($f);
                $FirstByteOfImage=$this->freaddword($f);

                $SizeBITMAPINFOHEADER=$this->freaddword($f);
                $Width=$this->freaddword($f);
                $Height=$this->freaddword($f);
                $biPlanes=$this->freadword($f);
                $biBitCount=$this->freadword($f);
                $RLECompression=$this->freaddword($f);
                $WidthxHeight=$this->freaddword($f);
                $biXPelsPerMeter=$this->freaddword($f);
                $biYPelsPerMeter=$this->freaddword($f);
                $NumberOfPalettesUsed=$this->freaddword($f);
                $NumberOfImportantColors=$this->freaddword($f);

                if($biBitCount<24)
                {
                        $img=imagecreate($Width,$Height);
                        $Colors=pow(2,$biBitCount);
                        for($p=0;$p<$Colors;$p++)
                        {
                                $B=$this->freadbyte($f);
                                $G=$this->freadbyte($f);
                                $R=$this->freadbyte($f);
                                $Reserved=$this->freadbyte($f);
                                $Palette[]=imagecolorallocate($img,$R,$G,$B);
                        };




                        if($RLECompression==0)
                        {
                                $Zbytek=(4-ceil(($Width/(8/$biBitCount)))%4)%4;

                                for($y=$Height-1;$y>=0;$y--)
                                {
                                        $CurrentBit=0;
                                        for($x=0;$x<$Width;$x++)
                                        {
                                                $C=freadbits($f,$biBitCount);
                                                imagesetpixel($img,$x,$y,$Palette[$C]);
                                        };
                                        if($CurrentBit!=0) {$this->freadbyte($f);};
                                        for($g=0;$g<$Zbytek;$g++)
                                        $this->freadbyte($f);
                                };

                        };
                };


                if($RLECompression==1) //$BI_RLE8
                {
                        $y=$Height;

                        $pocetb=0;

                        while(true)
                        {
                                $y--;
                                $prefix=$this->freadbyte($f);
                                $suffix=$this->freadbyte($f);
                                $pocetb+=2;

                                $echoit=false;

                                if($echoit)echo "Prefix: $prefix Suffix: $suffix<BR>";
                                if(($prefix==0)and($suffix==1)) break;
                                if(feof($f)) break;

                                while(!(($prefix==0)and($suffix==0)))
                                {
                                        if($prefix==0)
                                        {
                                                $pocet=$suffix;
                                                $Data.=fread($f,$pocet);
                                                $pocetb+=$pocet;
                                                if($pocetb%2==1) {$this->freadbyte($f); $pocetb++;};
                                        };
                                        if($prefix>0)
                                        {
                                                $pocet=$prefix;
                                                for($r=0;$r<$pocet;$r++)
                                                $Data.=chr($suffix);
                                        };
                                        $prefix=$this->freadbyte($f);
                                        $suffix=$this->freadbyte($f);
                                        $pocetb+=2;
                                        if($echoit) echo "Prefix: $prefix Suffix: $suffix<BR>";
                                };

                                for($x=0;$x<strlen($Data);$x++)
                                {
                                        imagesetpixel($img,$x,$y,$Palette[ord($Data[$x])]);
                                };
                                $Data="";

                        };

                };


                if($RLECompression==2) //$BI_RLE4
                {
                        $y=$Height;
                        $pocetb=0;

                        /*while(!feof($f))
                        echo $this->freadbyte($f)."_".$this->freadbyte($f)."<BR>";*/
                        while(true)
                        {
                                //break;
                                $y--;
                                $prefix=$this->freadbyte($f);
                                $suffix=$this->freadbyte($f);
                                $pocetb+=2;

                                $echoit=false;

                                if($echoit)echo "Prefix: $prefix Suffix: $suffix<BR>";
                                if(($prefix==0)and($suffix==1)) break;
                                if(feof($f)) break;

                                while(!(($prefix==0)and($suffix==0)))
                                {
                                        if($prefix==0)
                                        {
                                                $pocet=$suffix;

                                                $CurrentBit=0;
                                                for($h=0;$h<$pocet;$h++)
                                                $Data.=chr(freadbits($f,4));
                                                if($CurrentBit!=0) freadbits($f,4);
                                                $pocetb+=ceil(($pocet/2));
                                                if($pocetb%2==1) {$this->freadbyte($f); $pocetb++;};
                                        };
                                        if($prefix>0)
                                        {
                                                $pocet=$prefix;
                                                $i=0;
                                                for($r=0;$r<$pocet;$r++)
                                                {
                                                        if($i%2==0)
                                                        {
                                                                $Data.=chr($suffix%16);
                                                        }
                                                        else
                                                        {
                                                                $Data.=chr(floor($suffix/16));
                                                        };
                                                        $i++;
                                                };
                                        };
                                        $prefix=$this->freadbyte($f);
                                        $suffix=$this->freadbyte($f);
                                        $pocetb+=2;
                                        if($echoit) echo "Prefix: $prefix Suffix: $suffix<BR>";
                                };

                                for($x=0;$x<strlen($Data);$x++)
                                {
                                        imagesetpixel($img,$x,$y,$Palette[ord($Data[$x])]);
                                };
                                $Data="";

                        };

                };


                if($biBitCount==24)
                {
                        $img=imagecreatetruecolor($Width,$Height);
                        $Zbytek=$Width%4;

                        for($y=$Height-1;$y>=0;$y--)
                        {
                                for($x=0;$x<$Width;$x++)
                                {
                                        $B=$this->freadbyte($f);
                                        $G=$this->freadbyte($f);
                                        $R=$this->freadbyte($f);
                                        $color=imagecolorexact($img,$R,$G,$B);
                                        if($color==-1) $color=imagecolorallocate($img,$R,$G,$B);
                                        imagesetpixel($img,$x,$y,$color);
                                }
                                for($z=0;$z<$Zbytek;$z++)
                                $this->freadbyte($f);
                        };
                };
                return $img;

        };


        fclose($f);
	}

	public function freadbyte($f)
	{
        return ord(fread($f,1));
	}

	public function freadword($f)
	{
        $b1=$this->freadbyte($f);
        $b2=$this->freadbyte($f);
        return $b2*256+$b1;
	}

	public function freaddword($f)
	{
        $b1=$this->freadword($f);
        $b2=$this->freadword($f);
        return $b2*65536+$b1;
	}

	public function __construct()
	{
		
		 $json_string = file_get_contents( ZSystem . '/lib/ZhengFangNormal.json');  
      
    // 用参数true把JSON字符串强制转成PHP数组  
   $this->Keys = json_decode($json_string, true);  
	//print_r($this->Keys);
		if($this->Keys == false)
			$this->Keys = array();
		
	}
	public function __destruct()
	{
	
		 // $this->SSetWrite($this->Keys ,"key.php");

		//print_r($this->Keys);
	}
		    public function setJudgeDetails( $key,$judgeDetails ){
        $this->judgeDetails[$key] = $judgeDetails;
    }

public function SSetWrite($Data,$Dir){
	$File = dirname(__FILE__).'/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
	protected $ImagePath;
	protected $DataArray;
	protected $ImageSize;
	protected $data;
	protected $Keys;
	protected $NumStringArray;
	public $maxfontwith = 16;
	protected $resultContainer;
	protected      $setResultArr;
protected      $judgeDetails;

}
?>