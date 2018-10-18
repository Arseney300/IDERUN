#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(int argc, char const *argv[]) {
  /* code */
  ifstream file;
  file.open(argv[1],ios_base::in);
  if (!file.is_open()){
    cout << "can't open file" << endl;
    return 12;
  }
  ofstream new_file;
  new_file.open(argv[2],ios_base::trunc);
  if (!new_file.is_open()){
    cout << "can't open new_file" << endl;
    return 13;
  }
  string str;
  while (getline(file,str)){
    new_file << str << "\n";
  }

  file.close();
  new_file.close();
  return 0;
}
