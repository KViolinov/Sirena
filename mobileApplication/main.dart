import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:url_launcher/url_launcher.dart';
 
 
 
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
                      offset: Offset(0, 1),
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
                            Text(
                              'Сървърна платформа',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                            Text(
                              'Сървърната платформа за \nагрегиране и визуализация включва база \nданни за съхраняване на първичните данни, модул\n за комуникация с автоматизираните станции, модул \nза администрация, система за визуализация \nна данните, и система за известяване \nпри критични събития.',
                              style: TextStyle(fontSize: 16),
                            ),
                            Text(
                              'Мрежови агрегатор',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                            Text(
                              'Мрежови агрегатор, който служи като \nсвоеобразен прокси сървър и концентратор \nза първичните станции и способства \nкакто за разширяване на обхвата на \nпокритие на системата, така и за намаляване \nна себестойността на автоматизираните станции.',
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
  Future<List<dynamic>> fetchData() async {
    final apiUrl = 'http://kvb-bg.com/Sirena/api_for_cluster.php'; // Replace with your API endpoint URL

    try {
      final response = await http.get(Uri.parse(apiUrl));

      if (response.statusCode == 200) {
        return jsonDecode(response.body);
      } else {
        throw Exception('Failed to load data');
      }
    } catch (e) {
      throw Exception('Error: $e');
    }
  }

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
                  FutureBuilder(
                    future: fetchData(),
                    builder: (context, snapshot) {
                      if (snapshot.connectionState == ConnectionState.waiting) {
                        return CircularProgressIndicator();
                      } else if (snapshot.hasError) {
                        return Text('Error: ${snapshot.error}');
                      } else {
                        List<dynamic> data = snapshot.data ?? [];
                        return DataTable(
                          columns: [
                            DataColumn(label: Text('ID на клъстер')),
                            DataColumn(label: Text('Собственик')),
                            DataColumn(label: Text('Име на клъстер')),
                            DataColumn(label: Text('Описание на устройство')),
                            DataColumn(label: Text('Критично ниво')),
                          ],
                          rows: data.map((item) {
                            return DataRow(cells: [
                              DataCell(Text('${item['cluster_id']}')),
                              DataCell(Text('${item['user_id']}')),
                              DataCell(Text('${item['cluster_name']}')),
                              DataCell(Text('${item['cluster_description']}')),
                              DataCell(Text('${item['cluster_critical_level']}')),
                              
                            ]);
                          }).toList(),
                        );
                      }
                    },
                  ),
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
  Future<List<dynamic>> fetchData() async {
    final apiUrl = 'http://kvb-bg.com/Sirena/api.php'; // Replace with your API endpoint URL

    try {
      final response = await http.get(Uri.parse(apiUrl));

      if (response.statusCode == 200) {
        return jsonDecode(response.body);
      } else {
        throw Exception('Failed to load data');
      }
    } catch (e) {
      throw Exception('Error: $e');
    }
  }

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
                  FutureBuilder(
                    future: fetchData(),
                    builder: (context, snapshot) {
                      if (snapshot.connectionState == ConnectionState.waiting) {
                        return CircularProgressIndicator();
                      } else if (snapshot.hasError) {
                        return Text('Error: ${snapshot.error}');
                      } else {
                        List<dynamic> data = snapshot.data ?? [];
                        return DataTable(
                          columns: [
                            DataColumn(label: Text('ID')),
                            DataColumn(label: Text('Device ID')),
                            DataColumn(label: Text('Device Name')),
                            DataColumn(label: Text('Device MAC')),
                            DataColumn(label: Text('User ID')),
                            DataColumn(label: Text('Cluster ID')),
                            DataColumn(label: Text('Device Description')),
                            DataColumn(label: Text('Device Geo1')),
                            DataColumn(label: Text('Device Geo2')),
                            DataColumn(label: Text('Device Wifi SSID')),
                            DataColumn(label: Text('Device Wifi PASS')),
                            DataColumn(label: Text('Device Additional Description')),
                            DataColumn(label: Text('Sensor Water 1 Level')),
                            DataColumn(label: Text('Sensor Water 2 Level')),
                            DataColumn(label: Text('Sensor Water 3 Level')),
                            DataColumn(label: Text('Sensor Level 1 Alert Level')),
                            // Add more columns as needed
                          ],
                          rows: data.map((item) {
                            return DataRow(cells: [
                              DataCell(Text('${item['id']}')),
                              DataCell(Text('${item['device_id']}')),
                              DataCell(Text('${item['device_name']}')),
                              DataCell(Text('${item['device_mac']}')),
                              DataCell(Text('${item['user_id']}')),
                              DataCell(Text('${item['cluster_id']}')),
                              DataCell(Text('${item['device_description']}')),
                              DataCell(Text('${item['device_geolocation_1']}')),
                              DataCell(Text('${item['device_geolocation_2']}')),
                              DataCell(Text('${item['device_wifi_network_name']}')),
                              DataCell(Text('${item['device_wifi_network_password']}')),
                              DataCell(Text('${item['device_additional_description']}')),
                              DataCell(Text('${item['sensor_water_1_level']}')),
                              DataCell(Text('${item['sensor_water_2_level']}')),
                              DataCell(Text('${item['sensor_water_3_level']}')),
                              DataCell(Text('${item['sensor_level_1_alert_level']}')),
                              // Add more cells as needed
                            ]);
                          }).toList(),
                        );
                      }
                    },
                  ),
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
                  MemberCard('http://kvb-bg.com/Sirena/img/kosi2.jpg', 'Константин Виолинов', '9 г клас\nСистемен програмист\nПМГ "Васил Друмев"\nВелико Търново'),
                  MemberCard('http://kvb-bg.com/Sirena/img/ignatov.jpg', 'Георги Игнатов', 'старши учител\nПМГ "Васил Друмев"\nВелико Търново'),
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
  final String imageUrl;
  final String name;
  final String details;
 
  MemberCard(this.imageUrl, this.name, this.details);
 
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        _showMoreInformation(context);
      },
      child: Card(
        margin: EdgeInsets.symmetric(vertical: 8),
        child: ListTile(
          leading: CircleAvatar(
            backgroundImage: NetworkImage(imageUrl),
            radius: 30,
          ),
          title: Text(name),
          subtitle: Text(details),
        ),
      ),
    );
  }
 
void _showMoreInformation(BuildContext context) {
  showDialog(
    context: context,
    builder: (BuildContext context) {
      return AlertDialog(
        title: Text(name),
        content: Row(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            CircleAvatar(
              backgroundImage: NetworkImage(imageUrl),
              radius: 30,
            ),
            SizedBox(width: 16),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisSize: MainAxisSize.min,
                children: [
                  Text(details),
                ],
              ),
            ),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () {
              Navigator.of(context).pop();
            },
            child: Text('Close'),
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
 
   Widget buildContactPoint(IconData icon, String title, String value) {
    return ListTile(
      leading: Icon(icon),
      title: Text(title),
      subtitle: Text(value),
      onTap: () {
        if (icon == Icons.map) {
          // Open Google Maps with the address
          launch('https://www.google.com/maps/search/?api=1&query=$value');
        } else if (icon == Icons.email) {
          // Open email app with the email address
          launch('mailto:$value');
        } else if (icon == Icons.phone) {
          // Open phone app with the phone number
          launch('tel:$value');
        }
      },
    );
  }
}
