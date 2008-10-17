#!/bin/bash
/usr/bin/osascript <<EOT
	tell application "Finder"
		display dialog "It Works!"
	end tell
EOT
