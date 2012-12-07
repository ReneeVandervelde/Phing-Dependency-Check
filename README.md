Phing-Dependency-Check
======================
Phing-Dependency-Check is a library that allows phing to check PHP dependencies
for your application.

This application is intended for projects built on the system they are running 
on. It assumes that the PHP CLI is running with the same configuration as apache
or the web client you are using.

Extension Dependency
--------------------
The Extension dependency check allows you to assert that a specific PHP 
extension is installed on the system

The Phing task definition will look like this, with `PROJECT_LIBS_PATH` replaced
with the folder in which the library resides

```xml
	<taskdef name="ExtensionDependency" classname="Phing_Task_Dependency_Extension">
		<classpath refid="PROJECT_LIBS_PATH" />
	</taskdef>
```

The phing task call will look like this, with the extension replaced with your 
desired executable check

```xml
    <ExtensionDependency extension="imap" />
```

Version Dependency
------------------
The Version dependency check allows you to assert that a minimum PHP version is
installed on the system

The Phing task definition will look like this, with `PROJECT_LIBS_PATH` replaced
with the folder in which the library resides

```xml
	<taskdef name="VersionDependency" classname="Phing_Task_Dependency_Version">
		<classpath refid="PROJECT_LIBS_PATH" />
	</taskdef>
```

The phing task call will look like this, with the extension replaced with your 
desired executable check

```xml
    <VersionDependency version="5.3.2" />
```

Executable Dependency
---------------------
The Executable dependency check allows you to assert that a specific executable
exists on the system.

NOTE: This currently only supports direct paths, making it not OS agnostic.

The Phing task definition will look like this, with `PROJECT_LIBS_PATH` replaced
with the folder in which the library resides

```xml
	<taskdef name="ExecutableDependency" classname="Phing_Task_Dependency_Executable">
		<classpath refid="PROJECT_LIBS_PATH" />
	</taskdef>
```

The phing task call will look like this, with the executable path replaced with
your desired executable check

```xml
    <ExecutableDependency executable="/usr/bin/SOME_EXEC" />
```
