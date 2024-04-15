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
    final apiUrl = 'http://kvb-bg.com/Sirena/api_for_cluster.php';

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
        title: Text('СИРЕНА - Клъстери'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(16),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Text(
                'Страница с Клъстери',
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
                    return SingleChildScrollView(
                      scrollDirection: Axis.horizontal,
                      child: Container(
                        width: MediaQuery.of(context).size.width,
                        child: DataTable(
                          columns: [
                            DataColumn(label: Text('ID')),
                            DataColumn(label: Text('Cluster ID')),
                            DataColumn(label: Text('Cluster Name')),
                            // ... Other columns ...
                          ],
                          rows: data.map((item) {
                            return DataRow(cells: [
                              DataCell(Text('${item['id']}')),
                              DataCell(Text('${item['cluster_id']}')),
                              DataCell(
                                InkWell(
                                  onTap: () {
                                    // Navigate to a new screen with device information
                                    Navigator.push(
                                      context,
                                      MaterialPageRoute(
                                        builder: (context) => DeviceDetailsScreenCluster(item),
                                      ),
                                    );
                                  },
                                  child: Text('${item['cluster_name']}'),
                                ),
                              ),
                              // ... Other cells ...
                            ]);
                          }).toList(),
                        ),
                      ),
                    );
                  }
                },
              ),
            ],
          ),
        ),
      ),
    );
  }
}
class DeviceDetailsScreenCluster extends StatelessWidget {
  final dynamic deviceData;

  DeviceDetailsScreenCluster(this.deviceData);

  @override
  Widget build(BuildContext context) {
    // Build your UI for displaying detailed information about the selected device
    return Scaffold(
      appBar: AppBar(
        title: Text('Cluster Details'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('Cluster ID: ${deviceData['cluster_id']}'),
            Text('User ID: ${deviceData['user_id']}'),
            Text('Cluster Name: ${deviceData['cluster_name']}'),
            Text('Cluster Description: ${deviceData['cluster']}'),
            Text('Cluster Geo1: ${deviceData['cluster_geolocation1']}'),
            Text('Cluster Geo2: ${deviceData['cluster_geolocation2']}'),
            Text('Cluster Critical Level: ${deviceData['cluster_critical_level']}'),
            Text('Cluster Email Notification: ${deviceData['cluster_email_notation']}'),
            Text('Cluster Phone Notification Additional Description: ${deviceData['cluster_phone_notation']}'),
            Text('Cluster Additional Description: ${deviceData['cluster_additional_description']}'),
          ],
        ),
      ),
    );
  }
}





class Ustroistva extends StatelessWidget {
  Future<List<dynamic>> fetchData() async {
    final apiUrl = 'http://kvb-bg.com/Sirena/API_folder/api.php';

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
        title: Text('СИРЕНА - Устройства'),
        backgroundColor: Colors.green.withOpacity(0.5),
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(16),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              ElevatedButton(
                onPressed: () {
                  // Navigate to the AddDeviceFormScreen when the button is pressed
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => AddDeviceFormScreen(),
                    ),
                  );
                },
                child: Text('Добави устройство'),
              ),
              SizedBox(height: 16),
              Text(
                'Страница с Устройства',
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
                    return SingleChildScrollView(
                      scrollDirection: Axis.horizontal,
                      child: Container(
                        width: MediaQuery.of(context).size.width,
                        child: DataTable(
                          columns: [
                            DataColumn(label: Text('ID')),
                            DataColumn(label: Text('Device ID')),
                            DataColumn(label: Text('Device Name')),
                            // ... Other columns ...
                          ],
                          rows: data.map((item) {
                            return DataRow(cells: [
                              DataCell(Text('${item['id']}')),
                              DataCell(Text('${item['device_id']}')),
                              DataCell(
                                InkWell(
                                  onTap: () {
                                    // Navigate to a new screen with device information
                                    Navigator.push(
                                      context,
                                      MaterialPageRoute(
                                        builder: (context) => DeviceDetailsScreen(item),
                                      ),
                                    );
                                  },
                                  child: Text('${item['device_name']}'),
                                ),
                              ),
                              // ... Other cells ...
                            ]);
                          }).toList(),
                        ),
                      ),
                    );
                  } // <-- Add this closing parenthesis
                },
              ),
            ],
          ),
        ),
      ),
    );
  }
}
class DeviceDetailsScreen extends StatelessWidget {
  final dynamic deviceData;

  DeviceDetailsScreen(this.deviceData);

  @override
  Widget build(BuildContext context) {
    // Build your UI for displaying detailed information about the selected device
    return Scaffold(
      appBar: AppBar(
        title: Text('Device Details'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text('Device ID: ${deviceData['device_id']}'),
            Text('Device Name: ${deviceData['device_name']}'),
            Text('Device MAC: ${deviceData['device_mac']}'),
            Text('User ID: ${deviceData['user_id']}'),
            Text('Cluster ID: ${deviceData['cluster_id']}'),
            Text('cluster Description: ${deviceData['device_description']}'),
            Text('Device Geo1: ${deviceData['device_geolocation_1']}'),
            Text('Device Geo2: ${deviceData['device_geolocation_2']}'),
            Text('Device Wifi SSID: ${deviceData['device_wifi_network_name']}'),
            Text('Device Wifi Pass: ${deviceData['device_wifi_network_password']}'),
            Text('Device Additional Description: ${deviceData['device_additional_description']}'),
            Text('Device Water Level 1: ${deviceData['sensor_water_1_level']}'),
            Text('Device Water Level 2: ${deviceData['sensor_water_2_level']}'),
            Text('Device Water Level 3: ${deviceData['sensor_water_3_level']}'),
            Text('Sensor Level 1 Alert Level: ${deviceData['sensor_level_1_alert_level']}'),
          ],
        ),
      ),
    );
  }
}
class AddDeviceFormScreen extends StatelessWidget {
  final TextEditingController deviceNameController = TextEditingController();
  final TextEditingController deviceDescriptionController = TextEditingController();
  final TextEditingController deviceClusterController = TextEditingController();
  final TextEditingController deviceGeolocation1Controller = TextEditingController();
  final TextEditingController deviceGeolocation2Controller = TextEditingController();
  final TextEditingController sensorWater1LevelController = TextEditingController();
  final TextEditingController sensorWater2LevelController = TextEditingController();
  final TextEditingController sensorWater3LevelController = TextEditingController();
  final TextEditingController sensorLevel1AlertLevelController = TextEditingController();
  final TextEditingController deviceWiFiNameController = TextEditingController();
  final TextEditingController deviceWiFiPasswordController = TextEditingController();
  final TextEditingController deviceMACController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Страница за добавяне на устройство'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: SingleChildScrollView(
          child: Form(
            autovalidateMode: AutovalidateMode.onUserInteraction,
            child: Column(
              children: [
                TextFormField(
                  controller: deviceNameController,
                  decoration: InputDecoration(labelText: 'Име на устройство'),
                  validator: (value) {
                    if (value == null || value.trim().isEmpty) {
                      return 'Полето е задължително';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceDescriptionController,
                  decoration: InputDecoration(labelText: 'Описание на устройство'),
                ),
                TextFormField(
                  controller: deviceClusterController,
                  decoration: InputDecoration(labelText: 'Принадлежност към клъстер'),
                  validator: (value) {
                    if (value == null || value.trim().isEmpty) {
                      return 'Полето е задължително';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceGeolocation1Controller,
                  decoration: InputDecoration(labelText: 'Геолокация / Географска ширина'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+(\.\d+)?").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceGeolocation2Controller,
                  decoration: InputDecoration(labelText: 'Геолокация / Географска дължина'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+(\.\d+)?").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: sensorWater1LevelController,
                  decoration: InputDecoration(labelText: 'Критично ниво за известяване на сензор 1'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: sensorWater2LevelController,
                  decoration: InputDecoration(labelText: 'Критично ниво за известяване на сензор 2'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: sensorWater3LevelController,
                  decoration: InputDecoration(labelText: 'Критично ниво за известяване на сензор 3'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: sensorLevel1AlertLevelController,
                  decoration: InputDecoration(labelText: 'Критично ниво за известяване на ултразвуков сензор(в метри)'),
                  validator: (value) {
                    if (value == null || !RegExp(r"[+-]?\d+").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceWiFiNameController,
                  decoration: InputDecoration(labelText: 'Име на безжичната мрежа'),
                  validator: (value) {
                    if (value == null || value.trim().isEmpty) {
                      return 'Полето е задължително';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceWiFiPasswordController,
                  decoration: InputDecoration(labelText: 'Парола за безжичната мрежа'),
                  validator: (value) {
                    if (value == null || value.trim().isEmpty) {
                      return 'Полето е задължително';
                    }
                    return null;
                  },
                ),
                TextFormField(
                  controller: deviceMACController,
                  decoration: InputDecoration(labelText: 'MAC адрес / сериен номер на устройството'),
                  validator: (value) {
                    if (value == null || !RegExp(r"([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})").hasMatch(value.trim())) {
                      return 'Невалидна стойност';
                    }
                    return null;
                  },
                ),
                SizedBox(height: 16),
                ElevatedButton(
                  onPressed: () async {
                    print('Button pressed');
                    if (Form.of(context).validate()) {
                      // Collect form data
                      final formData = {
                        'device_name1': deviceNameController.text,
                        'device_description1': deviceDescriptionController.text,
                        'device_cluster1': deviceClusterController.text,
                        'device_geolocation11': deviceGeolocation1Controller.text,
                        'device_geolocation21': deviceGeolocation2Controller.text,
                        'sensor_water_1_level_1': sensorWater1LevelController.text,
                        'sensor_water_2_level_1': sensorWater2LevelController.text,
                        'sensor_water_3_level_1': sensorWater3LevelController.text,
                        'sensor_level_1_alert_level_1': sensorLevel1AlertLevelController.text,
                        'device_wifi_network_name1': deviceWiFiNameController.text,
                        'device_wifi_network_password1': deviceWiFiPasswordController.text,
                        'device_mac1': deviceMACController.text,
                      };

                      // Send data to the PHP backend
                      await sendFormDataToApi(formData);

                      // Navigate back to the previous screen
                      Navigator.pop(context);
                    }
                  },
                  child: Text('Добави устройство'),
                ),
                SizedBox(height: 16),
                ElevatedButton(
                  onPressed: () {
                    // Reset form fields
                    deviceNameController.clear();
                    deviceDescriptionController.clear();
                    deviceClusterController.clear();
                    deviceGeolocation1Controller.clear();
                    deviceGeolocation2Controller.clear();
                    sensorWater1LevelController.clear();
                    sensorWater2LevelController.clear();
                    sensorWater3LevelController.clear();
                    sensorLevel1AlertLevelController.clear();
                    deviceWiFiNameController.clear();
                    deviceWiFiPasswordController.clear();
                    deviceMACController.clear();

                    Navigator.pop(context);
                  },
                  child: Text('Отказ'),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }


 
Future<void> sendFormDataToApi(Map<String, dynamic> formData) async {
    final apiUrl = 'http://kvb-bg.com/Sirena/API_folder/test_api_adding_devices.php';

    final jsonData = jsonEncode(formData); // Convert map to JSON string

    try {
      final response = await http.post(
        Uri.parse(apiUrl),
        body: jsonData,
        headers: {"Content-Type": "application/json"}, // Set content type header
      );

      if (response.statusCode == 200) {
        // Handle the response if needed (e.g., show success message)
        /* deviceNameController.clear();
        deviceDescriptionController.clear();
        deviceClusterController.clear();
        deviceGeolocation1Controller.clear();
        deviceGeolocation2Controller.clear();
        sensorWater1LevelController.clear();
        sensorWater2LevelController.clear();
        sensorWater3LevelController.clear();
        sensorLevel1AlertLevelController.clear();
        deviceWiFiNameController.clear();
        deviceWiFiPasswordController.clear();
        deviceMACController.clear(); */

        // Navigate back (replace with your navigation logic)
        // Navigator.pop(context);
      } else {
        throw Exception('Failed to add device');
      }
    } catch (e) {
      throw Exception('Error: $e');
    }
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
