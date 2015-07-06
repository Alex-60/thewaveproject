window.addEventListener("load",function()
		{
			var zone = document.getElementById("cadre");
			
			zone.addEventListener("dragenter",entree,false);
			zone.addEventListener("dragover",survol,false);
			zone.addEventListener("drop",depot,false);
			
			function entree(event)
				{
					event.preventDefault();
				
				}
			function survol(event)
				{
					event.preventDefault();
					event.dataTransfer.dropEffect = "copy";
				}
			function depot(event)
				{
					event.preventDefault();
					var fichs = event.dataTransfer.files;
					var fd = new FormData(); // API HTML5
					fd.append("MAX_FILE_SIZE","4000000");
					for (i=0;i<fichs.length;i++)
						{
							fd.append("fichiers[]",fichs[i]);
						}
					var xhr = new XMLHttpRequest();
					xhr.onreadystatechange = function(event)
						{
							if(this.readyState==4)
								{
									document.getElementById("infos").innerHTML = this.responseText;
									
								}
						}
						xhr.open("POST","upload.php",true);
						xhr.send(fd);
				}
			
		},false);