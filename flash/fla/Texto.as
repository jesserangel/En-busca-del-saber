package  
{
	import flash.display.*;
	import flash.events.*;
	import flash.text.*;
	import flash.utils.Timer;
	
	public class Texto 
	{
		//Estilo de texto
		static const fontFace:String = "Myriad Pro";
		static const fontSize:int = 20;
		static const fontBold:Boolean = false;
		static const fontColor:Number = 0xFFFFFF;
		
		//Animación
		static const animsteps:int = 10;
		static const animStepTime:int = 50;
		static const startScale:Number = 0;
		static const endScale:Number = 2.0;
		
		private var tField:TextField;
		private var sprite:Sprite;
		private var parentMc:MovieClip;
		private var animTimer:Timer;

		public function Texto(mc:MovieClip, pts:Object, x, y:Number) 
		{
			
			var tFormat:TextFormat = new TextFormat();
			tFormat.font = fontFace;
			tFormat.size = fontSize;
			tFormat.bold = fontBold;
			tFormat.color = fontColor;
			tFormat.align = "center";
			
			tField = new TextField();
			tField.embedFonts = true;
			tField.selectable = false;
			tField.defaultTextFormat = tFormat;
			tField.autoSize = TextFieldAutoSize.CENTER;
			tField.text = String(pts);
			tField.x = -(tField.width/2);
			tField.y = -(tField.height/2);
			
			sprite = new Sprite();
			sprite.x = x;
			sprite.y = y;
			sprite.scaleX = startScale;
			sprite.scaleY = startScale;
			sprite.alpha = 0;
			sprite.addChild(tField);
			parentMc = mc;
			parentMc.addChild(sprite);
			
			animTimer = new Timer(animStepTime, animsteps);
			animTimer.addEventListener(TimerEvent.TIMER, rescaleSprite);
			animTimer.addEventListener(TimerEvent.TIMER_COMPLETE, removeSprite);
			animTimer.start();
		}
		public function rescaleSprite(timerEvent:TimerEvent)
		{
			var porcentaje:Number = timerEvent.target.currentCount/animsteps;
			sprite.scaleX = (1.0 - porcentaje)* startScale + porcentaje* endScale;
			sprite.scaleY = (1.0 - porcentaje)* startScale + porcentaje* endScale;
			sprite.alpha = 1.0 - porcentaje;
		}
		public function removeSprite(timerEvent:TimerEvent)
		{
			sprite.removeChild(tField);
			parentMc.removeChild(sprite);
			tField = null;
			sprite = null;
			delete this;
		}

	}
	
}
