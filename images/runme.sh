#!/bin/bash

# Loop through all files in the current directory with the .attach extension
for file in *.attach; do
    # Check if the file exists
    if [ -f "$file" ]; then
        # Rename the file by replacing the .attach extension with .jpg
        mv "$file" "${file%.attach}.jpg"
    fi
done
