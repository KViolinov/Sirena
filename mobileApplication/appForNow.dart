import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:url_launcher/url_launcher.dart';
import 'dart:async';
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
                    MaterialPageRoute(builder: (context) => Vizualizaciq()),
                  );
                } else if (value == 'option2') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => ZaProekta()),
                  );
                } else if (value == 'option3') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => Realizaciq()),
                  );
                } else if (value == 'option4') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => ZaNas()),
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
                    child: Text('За проекта'),
                  ),
                  PopupMenuItem<String>(
                    value: 'option3',
                    child: Text('Реализация'),
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
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center, // Center content vertically
            children: [
              Image.network(
                'http://kvb-bg.com/Sirena/img/logo-sirena.png', // Replace this with your actual image URL
                loadingBuilder: (context, child, progress) {
                  return progress == null ? child : CircularProgressIndicator();
                },
              ),
              SizedBox(height: 1.0), // Add spacing between image and text
              Text(
                'СИРЕНА - "Система за Известяване и Ранна Евакуация при Наводнения и Аварии"',
                style: TextStyle(fontSize: 30.0),
                textAlign: TextAlign.center,
              ),
            ],
          ),
        ),
      ),
    );
  }
}


class Vizualizaciq extends StatefulWidget {
  @override
  _VizualizaciqState createState() => _VizualizaciqState();
}

class _VizualizaciqState extends State<Vizualizaciq> {
  // Store the fetched device data
  List<Map<String, dynamic>> devices = [];

  // Timer for automatic data refresh
  Timer? _refreshTimer;

  @override
  void initState() {
    super.initState();
    fetchData();
    _startRefreshTimer();
  }

  @override
  void dispose() {
    _refreshTimer?.cancel(); // Cancel timer on widget disposal
    super.dispose();
  }

  // Function to fetch data from the API
  Future<void> fetchData() async {
    final response = await http.get(
      Uri.parse(
          'http://kvb-bg.com/Sirena/API_folder/api_visualization.php'), // Replace with your API URL
    );

    if (response.statusCode == 200) {
      final jsonData = jsonDecode(response.body) as List<dynamic>;
      devices = jsonData.cast<Map<String, dynamic>>();
      setState(() {}); // Update UI after data is fetched
    } else {
      print('Error fetching data: ${response.statusCode}');
    }
  }

  // Function to start the data refresh timer
  void _startRefreshTimer() {
    _refreshTimer?.cancel(); // Cancel any existing timer
    _refreshTimer = Timer.periodic(Duration(seconds: 5), (_) => fetchData());
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
                    'Страница за Визуализация',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 8),
                  // Display fetched device data
                  if (devices.isNotEmpty)
                    Column(
                      children: devices
                          .map((device) => _buildDeviceBox(device))
                          .toList(),
                    ),
                  if (devices.isEmpty)
                    Center(child: Text('Не бяха намерени устройства')),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildDeviceBox(Map<String, dynamic> device) {
    int status = 0;

    // Check sensor data and assign status
    if (device['sensor_water_3'] == 1) {
      status = 3; // Represents "Внимание Опасност"
    } else if (device['sensor_water_2'] == 1) {
      status = 2; // Represents "Повишено внимание"
    } else if (device['sensor_water_1'] == 1) {
      status = 1; // Represents "Повишаване на нивото"
    } else {
      status = 0; // Represents "Нормално ниво"
    }

    String statusText;
    switch (status) {
      case 3:
        statusText = 'Внимание Опасност';
        break;
      case 2:
        statusText = 'Повишено внимание';
        break;
      case 1:
        statusText = 'Повишаване на нивото';
        break;
      default:
        statusText = 'Нормално ниво';
    }

    return Container(
      padding: EdgeInsets.all(16.0), // Add padding for content
      margin: EdgeInsets.symmetric(vertical: 8.0), // Add spacing between boxes
      decoration: BoxDecoration(
        border: Border.all(color: Colors.grey),
        borderRadius: BorderRadius.circular(8.0), // Add rounded corners
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start, // Align text to the left
        children: [
          Text(
            'Устройство: ${device['device_name'] ?? 'N/A'}',
            style: TextStyle(fontSize: 16.0, fontWeight: FontWeight.bold),
          ),
          Text(
            'Координати: ${device['device_geolocation_1']?.toString() ?? 'N/A'} - ${device['device_geolocation_2']?.toString() ?? 'N/A'}',
          ),
          Text(
            'Статус: $statusText',
            style: TextStyle(
              color: getColorByStatus(status), // Use getColorByStatus function
            ),
          ),
        ],
      ),
    );
  }
}

Color getColorByStatus(int status) {
  switch (status) {
    case 3:
      return Colors.red.shade800; // Red for critical status
    case 2:
      return Colors.orange.shade800; // Orange for warning status
    case 1:
      return Colors.yellow.shade800; // Yellow for caution status
    default:
      return Colors.green; // Black for normal status
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
                  MemberCard(
                      'http://kvb-bg.com/Sirena/img/koceto.png',
                      'Константин Виолинов',
                      '9 г клас\nСистемен програмист\nПМГ "Васил Друмев"\nВелико Търново'),
                  MemberCard(
                      'http://kvb-bg.com/Sirena/img/ignatov.jpg',
                      'Георги Игнатов',
                      'Старши учител\nПМГ "Васил Друмев"\nВелико Търново'),
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

class ZaProekta extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('СИРЕНА - За проекта'),
          backgroundColor: Colors.green.withOpacity(0.5),
          leading: IconButton(
            icon: Icon(Icons.arrow_back),
            onPressed: () {
              Navigator.pop(context);
            },
          ),
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
            ],
          ),
        ),
      ),
    );
  }
}

class Realizaciq extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('СИРЕНА - Реализация'),
          backgroundColor: Colors.green.withOpacity(0.5),
          leading: IconButton(
            icon: Icon(Icons.arrow_back),
            onPressed: () {
              Navigator.pop(context);
            },
          ),
        ),
        body: SingleChildScrollView(
          child: Column(
            children: [
              Container(
                margin: EdgeInsets.symmetric(vertical: 20),
                padding: EdgeInsets.all(20),
                color: Colors.grey[200],
                child: Column(
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
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
                      mainAxisAlignment: MainAxisAlignment.start,
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
                      buildContactPoint(Icons.map, 'Адрес',
                          'гр. Велико Търново, \nул. "Вела Благоева" №10'),
                      buildContactPoint(Icons.email, 'Електронна поща',
                          'info-300122@edu.mon.bg'),
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
