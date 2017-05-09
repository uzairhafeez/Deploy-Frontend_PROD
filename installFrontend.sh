echo "UNZIP BUNDLE_FE"

package="$1"

mkdir $HOME/Packages/Unzip/

tar -xzf $HOME/Packages/$package -C /home/uzair/Packages/Unzip

sudo cp -a $HOME/Packages/Unzip/FE/. /var/www/html/
echo "Successfully installed"

echo -e "\n"
echo "Success"

