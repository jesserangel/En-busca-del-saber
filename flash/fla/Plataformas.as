package 
{

	import flash.display.*;
	import flash.events.*;
	import flash.text.*;
	import flash.utils.getTimer;
	import flash.utils.Timer;

	public class Plataformas extends MovieClip
	{

		public var gravedad:Number = .004;

		static const edgeDistance:Number = 100;

		private var fixedObjects:Array;
		private var otrosObj:Array;

		private var personaje:Object;
		private var enemigos:Array;

		private var score:int;
		private var gameMode:String = "start";
		private var vidas:int;
		private var lastTime:Number = 0;
		private var playerObjects:Array;
		private var maxUsos:int = 3;

		public function empezarJuego()
		{
			playerObjects = new Array();
			score = 0;
			gameMode = "play";
			vidas = 3;
		}

		public function empezarNivel()
		{
			crearHeroe();
			agregarEnemigos();

			examinarNivel();

			this.addEventListener(Event.ENTER_FRAME, gameLoop);
			stage.addEventListener(KeyboardEvent.KEY_DOWN, teclasPresionadas);
			stage.addEventListener(KeyboardEvent.KEY_UP, teclasSueltas);

			gameMode = "play";
			addScore(0);
			mostrarVidas();
		}
		public function crearHeroe()
		{
			personaje = new Object();
			personaje.mc = gamelevel.personaje;
			personaje.dx = 0.0;
			personaje.dy = 0.0;
			personaje.inAir = false;
			personaje.direccion = 1;
			personaje.animState = "stand";
			personaje.animCaminata = new Array(2,3,4,5,6,7,8,9);
			personaje.animstep = 0;
			personaje.jump = false;
			personaje.moveLeft = false;
			personaje.moveRight = false;
			personaje.jumpSpeed = .8;
			personaje.walkSpeed = .15;
			personaje.width = 20.0;
			personaje.height = 40.0;
			personaje.startx = personaje.mc.x;
			personaje.starty = personaje.mc.y;
			personaje.jetPack = false;
		}
		public function agregarEnemigos()
		{
			enemigos = new Array();
			var i:int = 1;
			while (true)
			{
				if (gamelevel["enemy" + i] == null)
				{
					break;
				}
				var enemy = new Object();
				enemy.mc = gamelevel["enemy" + i];
				enemy.dx = 0.0;
				enemy.dy = 0.0;
				enemy.inAir = false;
				enemy.direccion = 1;
				enemy.animstate = "stand";
				enemy.animCaminata = new Array(2,3,4,5);
				enemy.animstep = 0;
				enemy.jump = false;
				enemy.moveRight = true;
				enemy.moveLeft = false;
				enemy.jumpSpeed = 1.0;
				enemy.walkSpeed = .08;
				enemy.width = 30.0;
				enemy.height = 30.0;
				enemigos.push(enemy);
				i++;
			}
		}
		public function examinarNivel()
		{
			fixedObjects = new Array();
			otrosObj = new Array();
			for (var i:int = 0; i< gamelevel.numChildren; i++)
			{
				var mc = this.gamelevel.getChildAt(i);

				if ((mc is Piso) || (mc is Pared))
				{
					var pisoObjeto:Object = new Object();
					pisoObjeto.mc = mc;
					pisoObjeto.leftside = mc.x;
					pisoObjeto.rightside = mc.x + mc.width;
					pisoObjeto.topside = mc.y;
					pisoObjeto.bottomside = mc.y + mc.height;
					fixedObjects.push(pisoObjeto);
				}
				else if ((mc is Moneda) || (mc is Llave) || (mc is Puerta) || (mc is Logo))
				{
					otrosObj.push(mc);
				}
			}
		}
		public function gameLoop(event:Event)
		{
			if (lastTime == 0)
			{
				lastTime = getTimer();
			}
			var timeDiff:int = getTimer() - lastTime;
			lastTime +=  timeDiff;

			if (gameMode == "play")
			{
				moverPersonajes(personaje, timeDiff);
				moverEnemigos(timeDiff);
				detColisiones();
				scrollWithPlayer();
			}
		}
		public function teclasPresionadas(keyboardEvent:KeyboardEvent)
		{
			if(gameMode != "play") return;
			
			if(keyboardEvent.keyCode == 37)
			{
				personaje.moveLeft = true;
			}
			else if(keyboardEvent.keyCode == 39)
			{
				personaje.moveRight = true;
			}
			else if (keyboardEvent.keyCode == 32)
			{
				if(!personaje.inAir)
				{
					personaje.jump = true;
				}
			}
		}
		public function teclasSueltas(keyboardEvent:KeyboardEvent)
		{
			if(keyboardEvent.keyCode == 37)
			{
				personaje.moveLeft = false;
			}
			else if(keyboardEvent.keyCode == 39)
			{
				personaje.moveRight = false;
			}
		}
		public function moverEnemigos(timeDiff:int)
		{
			for (var i:int =0; i<enemigos.length; i++)
			{
				moverPersonajes(enemigos[i], timeDiff);

				if (enemigos[i].chocaParedDerecha)
				{
					enemigos[i].moveLeft = true;
					enemigos[i].moveRight = false;
				}
				else if (enemigos[i].chocaParedIzquierda)
				{
					enemigos[i].moveLeft = false;
					enemigos[i].moveRight = true;
				}
			}
		}
		public function moverPersonajes(objeto:Object, timeDiff:int)
		{
			if (timeDiff < 1)
			{
				return;
			}

			var cambioVertical:Number = objeto.dy * timeDiff + timeDiff * gravedad;

			if (cambioVertical > 15)
			{
				cambioVertical = 15.0;
			}
			objeto.dy +=  timeDiff * gravedad;

			var cambioHorizontal = 0;
			var newAnimState:String = "stand";
			var newDirection:int = objeto.direccion;

			if (objeto.moveLeft)
			{
				cambioHorizontal =  - objeto.walkSpeed * timeDiff;
				newAnimState = "walk";
				newDirection = -1;
			}
			else if (objeto.moveRight)
			{
				cambioHorizontal = objeto.walkSpeed * timeDiff;
				newAnimState = "walk";
				newDirection = 1;
			}
			if (objeto.jump)
			{
				if(objeto.jetPack)
				{
					gravedad = 0;
					objeto.mc.y = objeto.height + 20;
				}
				else
				{
					objeto.jump = false;
					objeto.dy =  -  objeto.jumpSpeed;
					cambioVertical =  -  objeto.jumpSpeed;
					newAnimState = "jump";
					gravedad = .004;
				}
			}
			objeto.chocaParedDerecha = false;
			objeto.chocaParedIzquierda = false;
			objeto.inAir = true;

			var newY:Number = objeto.mc.y + cambioVertical;

			for (var i:int = 0; i< fixedObjects.length; i++)
			{
				if ((objeto.mc.x + objeto.width/2 > fixedObjects[i].leftside) && (objeto.mc.x-objeto.width/2 < fixedObjects[i].rightside))
				{
					if ((objeto.mc.y <= fixedObjects[i].topside) && (newY > fixedObjects[i].topside))
					{
						newY = fixedObjects[i].topside;
						objeto.dy = 0;
						objeto.inAir = false;
						break;
					}
				}
			}

			var newX:Number = objeto.mc.x + cambioHorizontal;

			for (i = 0; i<fixedObjects.length; i++)
			{
				if ((newY > fixedObjects[i].topside) && ( newY-objeto.height < fixedObjects[i].bottomside))
				{
					if ((objeto.mc.x - objeto.width/2 >= fixedObjects[i].rightside)&&(newX- objeto.width/2 <= fixedObjects[i].rightside))
					{
						newX = fixedObjects[i].rightside + objeto.width/2;
						objeto.chocaParedIzquierda = true;
						break;
					}
					if ((objeto.mc.x + objeto.width/2 <= fixedObjects[i].leftside) && (newX + objeto.width/2 >= fixedObjects[i].leftside))
					{
						newX = fixedObjects[i].leftside - objeto.width / 2;
						objeto.chocaParedDerecha = true;
						break;
					}
				}
			}

			objeto.mc.x = newX;
			objeto.mc.y = newY;

			if (objeto.inAir)
			{
				if (objeto.jetPack)
				{
					newAnimState = "jetpack";
				}
				else
				{
					newAnimState = "jump";
				}
			}
			objeto.animState = newAnimState;
			if (objeto.animState == "walk")
			{
				objeto.animstep +=  timeDiff / 60;
				if (objeto.animstep > objeto.animCaminata.length)
				{
					objeto.animstep = 0;
				}
				objeto.mc.gotoAndStop(objeto.animCaminata[Math.floor(objeto.animstep)]);
			}
			else
			{
				objeto.mc.gotoAndStop(objeto.animState);
			}

			if (newDirection != objeto.direccion)
			{
				objeto.direccion = newDirection;
				objeto.mc.scaleX = objeto.direccion;
			}

		}
		public function scrollWithPlayer()
		{
			var stagePosition:Number = gamelevel.x + personaje.mc.x;
			var rightEdge:Number = stage.stageWidth - edgeDistance;
			var leftEdge:Number = edgeDistance;

			if (stagePosition > rightEdge)
			{
				gamelevel.x -= (stagePosition - rightEdge);
				if (gamelevel.x < -(gamelevel.width- stage.stageWidth))
				{
					gamelevel.x = - (gamelevel.width- stage.stageWidth);
				}

			}
			if (stagePosition < leftEdge)
			{
				gamelevel.x += (leftEdge - stagePosition);
				if (gamelevel.x > 0)
				{
					gamelevel.x = 0;
				}
			}
		}
		public function detColisiones()
		{
			for (var i:int = enemigos.length-1; i>=0; i--)
			{
				if (personaje.mc.hitTestObject(enemigos[i].mc))
				{
					if ((personaje.inAir) && (personaje.dy > 0))
					{
						enemyDie(i);
					}
					else
					{
						personajeDie();
					}
				}
			}
			
			for (i= otrosObj.length-1; i>=0; i--)
			{
				if(personaje.mc.hitTestObject(otrosObj[i]))
				{
					getObject(i);
				}
			}
		}
		public function enemyDie(NumeroEnemigo:int)
		{
			var texto:Texto = new Texto(gamelevel, "Muy bien!", enemigos[NumeroEnemigo].mc.x, enemigos[NumeroEnemigo].mc.y - 20);
			gamelevel.removeChild(enemigos[NumeroEnemigo].mc);
			enemigos.splice(NumeroEnemigo, 1);
		}
		public function personajeDie()
		{
			var mensaje:Mensaje = new Mensaje();
			mensaje.x = 175;
			mensaje.y = 100;
			addChild(mensaje);
			
			if (vidas == 0)
			{
				gameMode = "gameover";
				mensaje.message.text = "Has perdido!";
			}
			else
			{
				gameMode = "dead";
				mensaje.message.text = "Te distraiste :(";
				vidas--;
			}
			personaje.mc.gotoAndPlay("die");
		}
		public function getObject(objectNum:int)
		{
			if (otrosObj[objectNum] is Moneda)
			{
				var texto:Texto = new Texto(gamelevel,100,otrosObj[objectNum].x, otrosObj[objectNum].y);
				gamelevel.removeChild(otrosObj[objectNum]);
				otrosObj.splice(objectNum, 1);
				addScore(100);
			}
			else if (otrosObj[objectNum] is Llave)
			{
				var texto2:Texto = new Texto(gamelevel, "Tienes la llave!", otrosObj[objectNum].x, otrosObj[objectNum].y);
				playerObjects.push("Llave");
				gamelevel.removeChild(otrosObj[objectNum]);
				otrosObj.splice(objectNum, 1);
			}
			else if(otrosObj[objectNum] is Puerta)
			{
				if(playerObjects.indexOf("Llave") == -1) return;
				if(otrosObj[objectNum].currentFrame == 1)
				{
					otrosObj[objectNum].gotoAndPlay("open");
					nivelCompleto();
				}
			}
			else if(otrosObj[objectNum] is Logo)
			{
				gameComplete();
			}
			
		}
		public function addScore(numPuntos:int)
		{
			score += numPuntos;
			scoreDisplay.text = String(score);
		}
		public function mostrarVidas()
		{
			livesDisplay.text = String(vidas);
		}
		public function nivelCompleto()
		{
			gameMode = "done";
			var mensaje:Mensaje = new Mensaje();
			mensaje.x = 175;
			mensaje.y = 100;
			addChild(mensaje);
			mensaje.message.text = "Superaste el nivel!";
		}
		public function gameComplete()
		{
			gameMode = "gameover";
			var mensaje:Mensaje = new Mensaje();
			mensaje.x = 175;
			mensaje.y = 100;
			addChild(mensaje);
			mensaje.message.text = "Has finalizado el juego";
		}
		public function clickDialogButton(mouseEvent:MouseEvent)
		{
			removeChild(MovieClip(mouseEvent.currentTarget.parent));
			if(gameMode == "dead")
			{
				mostrarVidas();
				personaje.mc.x = personaje.startx;
				personaje.mc.y = personaje.starty;
				gameMode = "play";
			}
			else if (gameMode == "gameover")
			{
				cleanUp();
				gotoAndStop("start");
			}
			else if(gameMode == "done")
			{
				cleanUp();
				nextFrame();
			}
			stage.focus = stage;
		}
		public function cleanUp()
		{
			removeChild(gamelevel);
			this.removeEventListener(Event.ENTER_FRAME, gameLoop);
			stage.removeEventListener(KeyboardEvent.KEY_DOWN, teclasPresionadas);
			stage.removeEventListener(KeyboardEvent.KEY_UP, teclasSueltas);
			
		}
		
	}
}
