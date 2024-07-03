import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  static String routeName = "/home";

  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Hybrid Mart'),
        backgroundColor: Colors.blue,
      ),
      body: SafeArea(
        child: SingleChildScrollView(
          padding: EdgeInsets.symmetric(vertical: 16),
          child: Column(
            children: [
              SizedBox(height: 20),
              Header(),
              SizedBox(height: 20),
              Categories(),
              SizedBox(height: 20),
              FeaturedProducts(),
            ],
          ),
        ),
      ),
      bottomNavigationBar: BottomNavigationBar(
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: "Home"),
          BottomNavigationBarItem(
              icon: Icon(Icons.notifications_active), label: "Notifikasi"),
          BottomNavigationBarItem(icon: Icon(Icons.person), label: "Profil"),
        ],
      ),
    );
  }
}

class Header extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Text(
            'Selamat Berbelanja \ndan Bersenang-senang',
            style: TextStyle(
              fontSize: 24,
              fontWeight: FontWeight.bold,
            ),
          ),
          Icon(Icons.shopping_cart),
        ],
      ),
    );
  }
}

class Categories extends StatelessWidget {
  final List<String> categories = ["Bedak", "Minyak Rambut", "Parfume"];

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 100,
      child: ListView.builder(
        scrollDirection: Axis.horizontal,
        itemCount: categories.length,
        itemBuilder: (context, index) {
          return Padding(
            padding: const EdgeInsets.symmetric(horizontal: 8),
            child: Chip(
              label: Text(categories[index]),
            ),
          );
        },
      ),
    );
  }
}

class FeaturedProducts extends StatelessWidget {
  final List<Map<String, String>> products = [
    {"name": "Produk 1", "image": "lib/images/apple_pay.png"},
    {"name": "Produk 2", "image": "https://via.placeholder.com/150"},
    {"name": "Produk 3", "image": "https://via.placeholder.com/150"},
  ];

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            'Produk Unggulan',
            style: TextStyle(
              fontSize: 18,
              fontWeight: FontWeight.bold,
            ),
          ),
          SizedBox(height: 16),
          GridView.builder(
            shrinkWrap: true,
            physics: NeverScrollableScrollPhysics(),
            gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
              crossAxisCount: 2,
              mainAxisSpacing: 16,
              crossAxisSpacing: 16,
              childAspectRatio: 3 / 4,
            ),
            itemCount: products.length,
            itemBuilder: (context, index) {
              return Container(
                padding: EdgeInsets.all(8),
                color: Colors.grey[200],
                child: Column(
                  children: [
                    Expanded(
                      child: AspectRatio(
                        aspectRatio: 1, // Anda bisa mengatur rasio aspek sesuai kebutuhan
                        child: Image.network(
                          products[index]['image']!,
                          fit: BoxFit.cover,
                        ),
                      ),
                    ),
                    SizedBox(height: 8),
                    Text(products[index]['name']!),
                  ],
                ),
              );
            },
          ),
        ],
      ),
    );
  }
}
