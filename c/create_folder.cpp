#include <iostream>
#include <string>
using namespace std;
int main(int argc, char const *argv[]) {
  /* code */
  string str = "mkdir ";
  str.append(argv[1]);

  const char *c = str.c_str();
  system(c);
  //cout << i;
}
