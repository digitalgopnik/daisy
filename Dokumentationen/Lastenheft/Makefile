DIR=/Users/maxh/Workspaces/Uni/Numerik/

all: test

reloadVorschau:
	sleep 0
	osascript /Users/maxh/Workspaces/Projekte/CodingAid/RefreshTool/Vorschau.scpt

compile:
	latexmk -pdf HA1.tex

test: compile reloadVorschau
