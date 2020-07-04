{ pkgs ? import <nixpkgs> {} }:

pkgs.stdenv.mkDerivation
{
  name = "jeaye.com";
  buildInputs = with pkgs;
  [
    # Ruby building
    ruby
    bundler
    libxml2
    xz

    # Resource optimization
    optipng
  ];
}
