import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'СИРЕНА - За нас',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('СИРЕНА - Главна страница'),
          backgroundColor: Colors.green.withOpacity(0.5),
          actions: [
            PopupMenuButton<String>(
              onSelected: (value) {
                // Handle menu item selection
                if (value == 'option1') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => Vizualizaciq(),
                    ),
                  );
                } else if (value == 'option2') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => Klusteri(),
                    ),
                  );
                }
                else if (value == 'option3') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => Ustroistva(),
                    ),
                  );

                }else if (value == 'option4') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => ZaNas(),
                    ),
                  );
                }
              },
              itemBuilder: (BuildContext context) {
                return [
                  PopupMenuItem<String>(
                    value: 'option1',
                    child: Text('Визуализация'),
                  ),
                  PopupMenuItem<String>(
                    value: 'option2',
                    child: Text('Клъстери'),
                  ),
                  PopupMenuItem<String>(
                    value: 'option3',
                    child: Text('Устройства'),
                  ),
                  PopupMenuItem<String>(
                    value: 'option4',
                    child: Text('За нас'),
                  ),
                ];
              },
            ),
          ],
        ),
        body: SingleChildScrollView(
          child: Column(
            children: [
              // Section 1
              Container(
                margin: EdgeInsets.symmetric(vertical: 20),
                padding: EdgeInsets.all(20),
                decoration: BoxDecoration(
                  boxShadow: [
                    BoxShadow(
                      color: Colors.grey.withOpacity(0.5),
                      spreadRadius: 2,
                      blurRadius: 5,
                      offset: Offset(0, 3),
                    ),
                  ],
                ),
                child: Row(
                  children: [
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Наводненията са пряко следствие от валежи с висок интензитет и значително количество, съчетано с неподходяща инфраструктура за отвеждане на екстремното количество водни маси. \nПрез последните години честотата на подобни метеорологични явления се увеличава, както в резултат на настъпващите климатични промени, така и в резултат на човешката дейност (презастрояване, обезлесяване). \nЩетите от подобни събития се измерват в милиони лева, разрушена инфраструктура, а понякога и в човешки животи.',
                            style: TextStyle(fontSize: 16),
                          ),
                          Text(
                            'Основната цел на проекта е да разработи цялостна платформа за мониторинг на водните нива чрез система от автоматизирани станции за измерване, базирани на инженерната платформа ESP32/LoRa32. За целта ще бъде разработен инженерен прототип на автоматизирана станция, която ще позволява измерване на водните нива чрез 2 различни способа: \n(1) непрекъснато измерване на водното ниво чрез ултразвук, и \n(2) измерване за достигане на предварително дефинирани критични нива. Станцията ще подава събраната информация към собствен сървър на платформата, на който данните ще бъдат съхранявани и обработвани, а резултатите ще се достъпни за визуализация за крайните потребители.',
                            style: TextStyle(fontSize: 16),
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),

              // Section 2
              Container(
                margin: EdgeInsets.symmetric(vertical: 20),
                padding: EdgeInsets.all(20),
                color: Colors.grey[200],
                child: Column(
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Text(
                          'Технологично решение',
                          style: TextStyle(
                            fontSize: 24,
                            fontWeight: FontWeight.bold,
                            color: Colors.blue,
                          ),
                        ),
                        SizedBox(width: 10),
                        Container(
                          width: 50,
                          height: 2,
                          color: Colors.blue,
                        ),
                      ],
                    ),
                    SizedBox(height: 10),
                    Divider(),
                    SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceAround,
                      children: [
                        Column(
                          children: [
                            /*
                            Image.asset(
                              'assets/11.png',
                              width: 80,
                              height: 80,
                            ),
                            */
                            Text(
                              'Автоматизирана станция',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                            Text(
                              'Автоматизираната станция, \nбазирана на ESP32/LoRa32, \nкоято събира данни от първичните \nсензори, обработва ги и посредством \nмрежови протоколи предава данните \nкъм сървърната платформа.\n',
                              style: TextStyle(fontSize: 16),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}







class Vizualizaciq extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('СИРЕНА - Визуализация'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Text(
                    'Страница за Визуализация',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 8),
                  // Replace the images and text with your content
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
class Klusteri extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('СИРЕНА - Визуализация'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Text(
                    'Страница за Клъстери',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 8),
                  // Replace the images and text with your content
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
class Ustroistva extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('СИРЕНА - Визуализация'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Text(
                    'Страница за Устройства',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 8),
                  // Replace the images and text with your content
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}



class ZaNas extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('СИРЕНА - За нас'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            Padding(
              padding: const EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Text(
                    'Кои сме ние',
                    style: TextStyle(
                      fontSize: 20,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 8),
                  // Replace the images and text with your content
                  MemberCard('img/kosi2.jpg', 'Константин Виолинов', '9 г клас\nСистемен програмист\nПМГ "Васил Друмев"\nВелико Търново'),
                  MemberCard('img/ignatov2.jpg', 'Георги Игнатов', 'старши учител\nПМГ "Васил Друмев"\nВелико Търново'),
                ],
              ),
            ),
            ElevatedButton(
              onPressed: () {
                // Redirect to the "NachinZaVruzka" widget
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => NachinZaVruzka()),
                );
              },
              child: Container(
                color: Colors.lightGreen,
                padding: EdgeInsets.all(16),
                child: Column(
                  children: [
                    Text(
                      'За връзка',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 24,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    SizedBox(height: 8),
                    Text(
                      'Начин да се свържете с нас',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 16,
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
class MemberCard extends StatelessWidget {
  final String imagePath;
  final String name;
  final String details;

  MemberCard(this.imagePath, this.name, this.details);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        // Show more information when the card is tapped
        _showMoreInformation(context);
      },
      child: Card(
        margin: EdgeInsets.symmetric(vertical: 8),
        child: ListTile(
          leading: CircleAvatar(
            backgroundImage: AssetImage(imagePath),
            radius: 30,
          ),
          title: Text(name),
          subtitle: Text(details),
        ),
      ),
    );
  }

  // Function to show a dialog with more information
  void _showMoreInformation(BuildContext context) {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text(name),
          content: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(details),
              // Add more information fields as needed
            ],
          ),
          actions: [
            TextButton(
              onPressed: () {
                Navigator.of(context).pop();
              },
              child: Text('Затвори'),
            ),
          ],
        );
      },
    );
  }
}
class NachinZaVruzka extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Sirena - Начин за свързване"),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: Container(
        padding: EdgeInsets.all(20),
        child: Column(
          //crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            Text(
              'Контактна форма',
              style: TextStyle(
                fontSize: 24,
                fontWeight: FontWeight.bold,
                //textTransform: TextTransform.uppercase,
              ),
            ),
            SizedBox(height: 10),
            Container(
              height: 3,
              width: 50,
              color: Colors.green,
            ),
            SizedBox(height: 20),
            Row(
              children: [
                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      buildContactPoint(Icons.map, 'Адрес', 'гр. Велико Търново, \nул. "Вела Благоева" №10'),
                      buildContactPoint(Icons.email, 'Електронна поща', 'info-300122@edu.mon.bg'),
                      buildContactPoint(Icons.phone, 'Телефон', '062/ 629 506'),
                    ],
                  ),
                ),
              ],
            ),
            SizedBox(height: 20),
            // Add the Google Maps iframe here (if needed)
          ],
        ),
      ),
    );
  }

  Widget buildContactPoint(IconData icon, String title, String detail) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 20),
      child: Row(
        children: [
          Icon(icon, size: 40, color: Colors.blueGrey),
          SizedBox(width: 10),
          Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Text(
                title,
                style: TextStyle(
                  fontSize: 18,
                  fontWeight: FontWeight.bold,
                  color: Colors.blueGrey,
                ),
              ),
              Text(
                detail,
                style: TextStyle(fontSize: 16),
              ),
            ],
          ),
        ],
      ),
    );
  }
}
