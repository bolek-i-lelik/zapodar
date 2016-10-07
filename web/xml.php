<?php
// Чтение XML формата 
		$rxml = new XMLReader();    //Создание элемента для чтения
		$rxml->xml('uploads/yml.xml');        //Загрузка  XML, $nXML - строка в формате XML

		//Переместиться к первому элементу customer    
		while($rxml->read() && $rxml->name !== 'category');

		$amountSpent = 0;

		//Получим значение поля total у второго узла дерева
		while($rxml->name === 'category'){      
    		//Чтение текущего дочернего через SimpleXMLElement
    		$node = new SimpleXMLElement($rxml->readOuterXML());
    		//Проверяем, номер элемента, если он равен 2 то это искомый элемент
    		/*if($node->id == 2){
        		$amountSpent = $node->total;
        		break;
    		}*/
    		//Переместиться к следующему элементу customer 
    		$amountSpent = $node->total;
    		$rxml->next('category'); 
		}

		echo $amountSpent;
