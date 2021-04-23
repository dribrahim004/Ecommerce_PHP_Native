
				function setMoney(nominal,str)
				{
					//str_G = str;
					//return str+""+ nominal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
					//return str+""+ nominal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
					var hasil;
					hasil = str +""+ parseFloat(nominal)
					       .toFixed(2) // always two decimal digits
					       .replace(".", ",") // replace decimal point character with ,
					       .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator

					return hasil
				}

				function setMoney_nodouble(nominal,str)
				{
					return str+""+ nominal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
				}

				function getMoney(money) {
					var status = false;
					if (money == ""){
						money = 0;
					}else{
						while (status != true){
							money = money.replace(".", "");
							if (money.indexOf('.') < 0){
								status = true;
							}
						}
					}

					return parseInt(money);
				}

				function getMoney_double(money) {
					var status = false;
					if (money == ""){
						money = 0;
					}else{
						while (status != true){
							money = money.replace(".", "");
							if (money.indexOf('.') < 0){
								status = true;
							}
						}
					}

					money = money.replace(",", ".");
					
					return money;
				}

				function getMoney_rp(money) {
					var status = false;
					if (money == ""){
						money = 0;
					}else{
						while (status != true){
							money = money.replace("Rp ", "");
							money = money.replace(".", "");
							if (money.indexOf('.') < 0){
								status = true;
							}
						}
					}

					return parseInt(money);
				}