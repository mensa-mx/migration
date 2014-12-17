import sys
import sexmachine.detector as gender


# https://pypi.python.org/pypi/SexMachine/
d = gender.Detector()

print d.get_gender(sys.argv[1]).upper()
